<?php
/**
 * @copyright Ilch 2.0
 * @package ilch
 */

namespace Modules\Agb\Mappers;

use Modules\Agb\Models\Agb as AgbModel;

class Agb extends \Ilch\Mapper
{
    /**
     * Gets the Agb.
     *
     * @param array $where
     * @return AgbModel[]|array
     */
    public function getAgb($where = [])
    {
        $entryArray = $this->db()->select('*')
            ->from('agb')
            ->where($where)
            ->order(['position' => 'ASC'])
            ->execute()
            ->fetchRows();

        if (empty($entryArray)) {
            return null;
        }

        $agb = [];
        foreach ($entryArray as $entries) {
            $entryModel = new AgbModel();
            $entryModel->setId($entries['id']);
            $entryModel->setTitle($entries['title']);
            $entryModel->setText($entries['text']);
            $entryModel->setShow($entries['show']);
            $agb[] = $entryModel;
        }

        return $agb;
    }

    /**
     * Gets agb.
     *
     * @param integer $id
     * @return AgbModel|null
     */
    public function getAgbById($id)
    {
        $agb = $this->getAgb(['id' => $id]);

        return reset($agb);
    }

    /**
     * Inserts or updates agb model.
     *
     * @param AgbModel $agb
     */
    public function save(AgbModel $agb)
    {
        $fields = [
            'title' => $agb->getTitle(),
            'text' => $agb->getText(),
            'show' => $agb->getShow()
        ];

        if ($agb->getId()) {
            $this->db()->update('agb')
                ->values($fields)
                ->where(['id' => $agb->getId()])
                ->execute();
        } else {
            $this->db()->insert('agb')
                ->values($fields)
                ->execute();
        }
    }

    /**
     * Updates agb with given id.
     *
     * @param integer $id
     */
    public function update($id)
    {
        $show = (int) $this->db()->select('show')
            ->from('agb')
            ->where(['id' => $id])
            ->execute()
            ->fetchCell();

        if ($show == 1) {
            $this->db()->update('agb')
                ->values(['show' => 0])
                ->where(['id' => $id])
                ->execute();
        } else {
            $this->db()->update('agb')
                ->values(['show' => 1])
                ->where(['id' => $id])
                ->execute();
        }
    }

    /**
     * Sort agb.
     *
     * @param int $id
     * @param int $key
     */
    public function sort($id, $key)
    {
        $this->db()->update('agb')
            ->values(['position' => $key])
            ->where(['id' => $id])
            ->execute();
    }

    /**
     * Deletes agb with given id.
     *
     * @param integer $id
     */
    public function delete($id)
    {
        $this->db()->delete('agb')
            ->where(['id' => $id])
            ->execute();
    }
}
