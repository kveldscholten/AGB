<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Agb\Models;

class Agb extends \Ilch\Model
{
    /**
     * The id of the agb.
     *
     * @var int
     */
    protected $id;

    /**
     * The title of the agb.
     *
     * @var string
     */
    protected $title;

    /**
     * The text of the agb.
     *
     * @var string
     */
    protected $text;

    /**
     * The show of the agb.
     *
     * @var int
     */
    protected $show;

    /**
     * Gets the id of the agb.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the id of the agb.
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * Gets the title of the agb.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title of the agb.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = (string)$title;

        return $this;
    }

    /**
     * Gets the text of the agb.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the text of the agb.
     *
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = (string)$text;

        return $this;
    }

    /**
     * Gets the show of the agb.
     *
     * @return int
     */
    public function getShow()
    {
        return $this->show;
    }

    /**
     * Sets the show of the agb.
     *
     * @param int $show
     * @return $this
     */
    public function setShow($show)
    {
        $this->show = (int)$show;

        return $this;
    }
}
