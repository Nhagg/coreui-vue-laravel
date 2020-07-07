<?php


namespace App\Services;


use App\Models\Tracking;
use App\Repositories\TrackingRepository;

class TrackingService
{

    /** @var TrackingRepository */
    private $trackingRepo;

    public function __construct()
    {
        $this->trackingRepo = app(TrackingRepository::class);
    }

    public function store($input)
    {
        $lessionId = (int)($input['lession_id'] ?? 0);
        $learnUnitId = (int)($input['learn_unit_id'] ?? 0);
        $learnItemId = (int)($input['learn_item_id'] ?? 0);
        $progress = (int)($input['progress'] ?? 0);
        $userId = request()->user()->id ?? (int)($input['user_id'] ?? 0);

        if ($userId <= 0) {
            return null;
        }

        $type = $this->parseTrackingType($lessionId, $learnUnitId, $learnItemId);
        if (empty($type)) {
            return null;
        }

        $where = [['user_id', '=', $userId]];
        switch ($type) {
            case Tracking::TYPE_LEARN_ITEM:
                $where[] = ['learn_item_id', '=', $learnItemId];
                break;
            case Tracking::TYPE_LEARN_UNIT:
                $where[] = ['learn_unit_id', '=', $learnUnitId];
                break;
            case Tracking::TYPE_LESSION:
                $where[] = ['lession_id', '=', $lessionId];
                break;
        }


        return $this->trackingRepo->updateOrCreate($where, [
            'lession_id' => $lessionId,
            'learn_unit_id' => $learnUnitId,
            'learn_item_id' => $learnItemId,
            'type' => $type,
            'progress' => $progress,
            'user_id' => $userId
        ]);

    }

    private function parseTrackingType($lessionId, $learnUnitId, $learnItemId)
    {
        if ($learnItemId > 0) {
            return Tracking::TYPE_LEARN_ITEM;
        }

        if ($learnUnitId > 0) {
            return Tracking::TYPE_LEARN_UNIT;
        }

        if ($lessionId > 0) {
            return Tracking::TYPE_LESSION;
        }

        return null;
    }

}
