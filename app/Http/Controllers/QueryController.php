<?php

    namespace App\Http\Controllers;

    use App\Models\Query;
    use Illuminate\Http\Request;

    class QueryController extends Controller {

        public function show($id)
        {
            $query = Query::findOrFail($id);

            return view('dashboard.query.query_show', ['query' => $query]);
        }

        public function store()
        {
            $query = Query::create(request('data'));

            return $query;
        }

        public function update()
        {
            $query = Query::findOrFail(request('id'));
            $query->fill(request('data'));
            $query->save();

            return $query;
        }

        public function delete($id)
        {
            $query = Query::findOrFail($id);
            $query->delete();
            return $query;
        }
    }
