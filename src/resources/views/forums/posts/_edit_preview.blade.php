<div class="box-header">{{ _('Preview') }}: {{{ isset($title) ? $title : $post->topic->title }}}</div>
@include('Kaamaru\Forums::forums.topics._preview', ['post' => $postPreview, 'topic' => $post->topic, 'title' => $title])
