<figure>
    <img src="{{ url($post->photos->first()->url) }}"
         class="img-responsive"
         alt="{{ __('Foto: ') . $post->title }}"
    >
</figure>
