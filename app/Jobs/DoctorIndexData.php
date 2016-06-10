<?php

namespace App\Jobs;

use App\Doctor;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\SelfHandling;

class DoctorIndexData extends Job implements SelfHandling
{
    protected $tag;

    /**
     * Constructor
     *
     * @param string|null $tag
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    /**
     * Execute the command.
     *
     * @return array
     */
    public function handle()
    {
        if ($this->tag) {
            return $this->tagIndexData($this->tag);
        }

        return $this->normalIndexData();
    }

    /**
     * Return data for normal index page
     *
     * @return array
     */
    protected function normalIndexData()
    {
        $doctors = Doctor::all();

        return [
            'title' => config('doctor.title'),
            'subtitle' => config('doctor.subtitle'),
            'doctors' => $doctors,
            'meta_description' => config('doctor.description'),
            'reverse_direction' => false,
            'tag' => null,
        ];
    }

    /**
     * Return data for a tag index page
     *
     * @param string $tag
     * @return array
     */
    protected function tagIndexData($tag)
    {
        $tag = Tag::where('tag', $tag)->firstOrFail();
        $reverse_direction = (bool)$tag->reverse_direction;

        $posts = Post::where('published_at', '<=', Carbon::now())
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            })
            ->where('is_draft', 0)
            ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
            ->simplePaginate(config('doctor.posts_per_page'));
        $posts->addQuery('tag', $tag->tag);

        $page_image = $tag->page_image ?: config('doctor.page_image');

        return [
            'title' => $tag->title,
            'subtitle' => $tag->subtitle,
            'posts' => $posts,
            'page_image' => $page_image,
            'tag' => $tag,
            'reverse_direction' => $reverse_direction,
            'meta_description' => $tag->meta_description ?: config('doctor.description'),
        ];
    }
}
