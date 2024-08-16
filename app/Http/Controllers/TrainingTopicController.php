<?php

namespace App\Http\Controllers;

use App\Models\TrainingTopic;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TrainingTopicController extends Controller
{
    public function index()
    {
        $trainingTopic = TrainingTopic::with('division')->orderBy('id')->paginate(5);

        // Mengambil division yang hanya terkait dengan training topics
        $divisionIds = $trainingTopic->pluck('id_division')->unique();
        $divisions = Division::whereIn('id', $divisionIds)->get()->keyBy('id');

        // Mengambil semua division
        $allDivisions = Division::all()->keyBy('id');
        return view('adminPage.dashboardAdmin', compact('trainingTopic', 'divisions', 'allDivisions'));
    }

    public function show($id)
    {
        $topic = TrainingTopic::find($id);
        return view('adminPage.show', compact('topic'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'id_division' => 'required|exists:divisions,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('topics', 'public');

        $topic = TrainingTopic::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'id_division' => $validatedData['id_division'],
            'image' => $imagePath,
        ]);

        // Kembalikan respons JSON
        return response()->json([
            'success' => true,
            'message' => 'Topic added successfully',
        ]);
    }

    public function edit($id)
    {
        // Mengambil data topik berdasarkan id
        $topic = TrainingTopic::findOrFail($id);

        // Mengambil semua divisi untuk ditampilkan di dropdown
        $divisions = Division::all();

        return view('adminPage.edit', compact('topic', 'divisions'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'id_division' => 'required|exists:divisions,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengambil data topik berdasarkan id
        $topic = TrainingTopic::findOrFail($id);

        // Memperbarui data topik
        $topic->title = $validatedData['title'];
        $topic->description = $validatedData['description'];
        $topic->id_division = $validatedData['id_division'];

        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Menghapus gambar lama dari storage
            if ($topic->image) {
                Storage::disk('public')->delete($topic->image);
            }

            // Menyimpan gambar baru dan memperbarui path gambar
            $imagePath = $request->file('image')->store('topics', 'public');
            $topic->image = $imagePath;
        }

        // Menyimpan perubahan ke database
        $topic->save();

        // Kembalikan respons JSON
        return response()->json([
            'success' => true,
            'message' => 'Topic updated successfully',
        ]);
    }


    public function destroy($id)
    {
        $topic = TrainingTopic::findOrFail($id);

        // Menghapus gambar dari storage
        if ($topic->image) {
            Storage::disk('public')->delete($topic->image);
        }

        // Menghapus topik dari database
        $topic->delete();

        return response()->json(['success' => true, 'message' => 'Training topic deleted successfully.']);
    }
}
