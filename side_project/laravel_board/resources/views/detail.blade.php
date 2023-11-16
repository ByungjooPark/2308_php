@extends('layout.layout')

@section('title', 'Detail')

@section('main')
<main>
	<div class="card">
		<div class="card-header">
			<p>{{$data->b_id}}</p>
			<h5 class="card-title">{{$data->b_title}}</h5>
			<p>{{'조회수 : '.$data->b_hits}}</p>
		</div>
		<div class="card-body">
			<p class="card-text">{{$data->b_content}}</p>
			<hr>
			<p>{{'작성일 : '.$data->created_at}}</p>
			<p>{{'수정일 : '.$data->updated_at}}</p>
		</div>
		<div class="card-footer">
			<form action="{{route('board.destroy', ['board' => $data->b_id])}}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">삭제</button>
			</form>
		</div>
	</div>
</main>
@endsection