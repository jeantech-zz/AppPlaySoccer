<?php
namespace App\Actions\GenerateGame;

use App\Models\TeamGroup;

class TeamGroupAction
{
    public static function execute(array $data): void
    {
        $teamgroup = new TeamGroup();
        $teamgroup->group_id = $data['group_id'];
        $teamgroup->team_id =  $data['team_id'];

         $teamgroup->save();
    }
}
