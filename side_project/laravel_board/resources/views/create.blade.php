@extends('layout.layout')

@section('title', 'Create')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
	<form method="POST" action="{{route('board.store')}}" style="width: 300px">
		@include('layout.errorlayout')
		@csrf
		<div class="mb-3">
			<label for="b_title" class="form-label">제목</label>
			<input type="text" class="form-control" id="b_title" name="b_title">
		</div>
		<div class="mb-3">
			<label for="b_content" class="form-label">내용</label>
			<input type="text" class="form-control" id="b_content" name="b_content">
		</div>
		<a class="btn btn-secondary" href="{{route('board.index')}}">취소</a>
		<button type="submit" class="btn btn-dark float-end">작성</button>
	</form>
</main>
@endsection