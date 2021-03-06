<?php namespace B50\Forums\Topics\Edit;

use B50\Forums\Topics\TopicRepoInterface;

/**
 * Edit topic
 *
 * @package B50\Forums\Posts\Edit
 */
class TopicEditor
{
    /**
     * @param TopicRepoInterface $topic
     */
    public function __construct(TopicRepoInterface $topic)
    {
        $this->topicRepo = $topic;
    }

    /**
     * @param $topicId
     * @param $input
     */
    public function edit($topicId, $input)
    {
        // Edit topic's title
        $data = ['title' => $input['title']];

        // Edit topic's tag
        if (\Bouncer::hasPermission('forums.tag') and \Input::get('tag')) {
            $data['tag'] = \Input::get('tag');
        }

        // Edit topic
        $this->topicRepo->updateTopic($topicId, $data);

    }
}
