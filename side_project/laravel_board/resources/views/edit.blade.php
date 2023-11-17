@extends('layout.layout')

@section('title', 'Edit')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
	<form method="POST" action="{{route('board.update', ['board' => $data->b_id])}}" style="width: 300px">
		@include('layout.errorlayout')
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label for="b_title" class="form-label">제목</label>
			<input type="text" class="form-control" id="b_title" name="b_title" value="{{$data->b_title}}">
		</div>
		<div class="mb-3">
			<label for="b_content" class="form-label">내용</label>
			<input type="text" class="form-control" id="b_content" name="b_content" value="{{$data->b_content}}">
		</div>
		<a class="btn btn-secondary" href="{{route('board.show', ['board' => $data->b_id])}}">취소</a>
		<button type="submit" class="btn btn-dark float-end">수정</button>
	</form>
</main>
@endsection