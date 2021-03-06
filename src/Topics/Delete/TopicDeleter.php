<?php namespace B50\Forums\Topics\Delete;

use B50\Forums\Core\Paths\PathInterface;
use B50\Forums\Add;
use B50\Forums\Topics\TopicRepoInterface;

/**
 * I delete topics >:D
 *
 * @package App\Forums\Topic
 */
class TopicDeleter
{
    /**
     * @param TopicRepoInterface $topic
     * @param Add $add
     */
    public function __construct(TopicRepoInterface $topic, Add $add)
    {
        $this->topicRepo = $topic;
        $this->add = $add;
    }

    /**
     * Delete the topic
     *
     * @param TopicDeleteListener $listener
     * @param PathInterface $topic
     * @return TopicDeleteListener
     */
    public function delete(TopicDeleteListener $listener, PathInterface $topic)
    {
        $this->topicRepo->delete($topic->id);
        $this->add->deleteTopic($topic);

        return $listener->topicDeleted($topic);
    }
}
