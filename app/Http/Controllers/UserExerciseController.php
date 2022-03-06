<?php

namespace App\Http\Controllers;

use App\Models\UserExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserExerciseController extends Controller
{
    public function index(string $userId)
    {
        return UserExercise::where('user_id', '=', $userId)->get();
    }

    public function search(Request $request, string $userId) {
        $search = strip_tags($request->input('name'));

        return UserExercise::where('user_id', '=', $userId, 'and')->where('name', 'like', '%'.$search.'%')->get();
    }

    public function save(Request $request, string $userId) {
        $data = json_decode($request->getContent(), true);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'category' =>  ['required', 'string', 'max:255'],
            'equipment' =>  ['required', 'string', 'max:255'],
            'type' =>  ['required', 'string', 'max:255'],
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            return $validator->errors();
        }

        $validated = $validator->validated();
        $validated = $validator->safe()->all();

        $findModel = !isset($validated['id']) ? ['user_id' => $userId] : ['user_id' => $userId, 'id' => $validated['id']];

        return UserExercise::updateOrCreate($findModel, $validated);
    }

    public function delete(string $userId, int $id) {
        $exercise = UserExercise::where('user_id', '=', $userId, 'and')->where('id', '=', $id)->first();

        if($exercise == null) {
            return response()->json([
                'message' => "Exercise with id: $id does not exist"
            ]);
        }

        $exercise->delete();

        return response()->json([
            'message' => "Exercise with id: $id has been deleted"
        ]);
    }
}

