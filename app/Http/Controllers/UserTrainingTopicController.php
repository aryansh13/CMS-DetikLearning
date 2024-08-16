<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingTopic;
use App\Models\Division;

class UserTrainingTopicController extends Controller
{
    public function index()
    {
        $trainingTopics = TrainingTopic::with('division')->orderBy('id')->get();

        // Mengambil division yang hanya terkait dengan training topics
        $divisionIds = $trainingTopics->pluck('id_division')->unique();
        $divisions = Division::whereIn('id', $divisionIds)->get()->keyBy('id');

        return view('userPage.userDashboard', compact('trainingTopics', 'divisions'));
    }
}
