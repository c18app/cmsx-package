<?php

namespace C18app\Cmsx\Traits;

trait Sort
{
    public function sort($idsOrder = null)
    {
        $i = 0;
        if ($idsOrder) {
            foreach ($idsOrder as $id) {
                $i++;
                $row = $this->where('id', $id)->first();
                $row->order = $i;
                $row->save();
            }
        } else {
            $data = $this->where('id', '>', 0)->where('order', '>', 0)->orderBy('order', 'asc')->orderBy('id',
                'asc')->get();

            foreach ($data as $row) {
                $i++;
                $row->order = $i;
                $row->save();
            }
        }

        $dataUnsorted = $this->where('id', '>', 0)->where('order', '<=', 0)->orderBy('id', 'asc')->get();
        foreach ($dataUnsorted as $row) {
            $i++;
            $row->order = $i;
            $row->save();
        }

        return $this;
    }
}