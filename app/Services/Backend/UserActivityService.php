<?php
namespace App\Services\Backend;

use App\Models\UserActivity;

class UserActivityService {

    public function getAll()
    {
        if(auth()->user()->can('users_activity_list')){
            $query = UserActivity::with('user');
            if (!auth()->user()->hasRole('Creator')) {
                $roleId = auth()->user()->roles->first()?->id;
                $query->whereHas('user.roles', function ($q) use ($roleId) {
                    $q->where('id', '>=', $roleId);
                });
            }
            return $query->latest('id')->paginate(20);
        }elseif(auth()->user()->can('own_activity_list')){
            return UserActivity::where('user_id', auth()->user()->id)->with('user')->latest('id')->paginate(20);
        }
        return ;
    }
    public function index()
    {
        return [
            'model_data' => $this->getAll(),
            'empty_message' => 'No Activity Found.',
            'page_title' => 'User Activity',
        ];
    }

    public function store($modelData, $model, $action, $title = null)
    {
        if($action == 'cache.clear') {

//            dd(auth()->user());
            $data = [
                'user_id' => $modelData->id,
                'model' => null,
                'model_id' => null,
                'title' => $title,
                'action' => $action,
                'description' => null,
                'previous_data' => null,
                'new_data' => null,
            ];
        } else {
            // 🔹 OLD values (before update)
            $oldData = $modelData->getOriginal();
            // 🔹 Only changed fields (BEST PRACTICE)
            $changed = $modelData->getChanges();
            if (isset($changed['updated_at'])) {
                unset($changed['updated_at']);
            }

            $oldChanged = array_intersect_key(
                $oldData,
                $changed
            );
            $data = [
                'user_id' => auth()?->user()?->id ?? null,
                'model' => class_basename($model),
                'model_id' => $modelData->id,
                'title' => $title,
                'action' => $action,
                'description' => count($changed) > 0 ? "Modified Keys: " . implode(', ', array_keys($changed)) : null,
                'previous_data' => $oldChanged,
                'new_data' => $changed,
            ];
        }
//        dd();
        return UserActivity::create($data);
    }
}
