@extends('layouts.app')

@section('content')
<x-sub-head>All projects</x-sub-head>


<div class="container">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-light">
            <thead>
                <tr class="tr-data">
                    <th scope="col">Id</th>
                    <th scope="col">Cover image</th>
                    <th scope="col" class="th-title">Title</th>
                    <th class="th-slug" scope="col">Slug</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)

                <tr class="row-data">
                    <td scope="row">{{$project->id}}</td>

                    <td>

                        @if(Str::startsWith($project->cover_image , 'https://'))
                        <img width="150" height="200" src="{{$project->cover_image}}" alt="{{$project->title}}">
                        @else
                        <img width="150" height="200" src="{{asset('storage/' . $project->cover_image)}}"
                            alt="{{$project->title}}">
                        @endif

                    </td>

                    <td class="td-title">{{$project->title}}</td>
                    <td class="td-slug">{{$project->slug}}</td>

                    <style>
                        tr.row-data {
                            @media screen and (max-width: 600px) {
                                height: 150px;

                                & img {
                                    width: 100px;
                                    height: 150px;
                                }
                            }

                            @media screen and (max-width: 600px) {
                                height: 100px;

                                & img {
                                    width: 70px;
                                    height: 100px;
                                }
                            }
                        }

                        th.th-slug,
                        td.td-slug {
                            @media screen and (max-width: 750px) {
                                display: none;
                            }
                        }

                        th.th-title,
                        td.td-title {
                            @media screen and (max-width: 450px) {
                                width: 20%;
                            }
                        }

                        td#td-buttons {
                            width: 20%;

                            @media screen and (max-width: 600px) {
                                width: 10%;
                            }

                            >div {
                                width: 50%;
                                display: flex;
                                flex-direction: column;
                                margin: auto auto;

                                @media screen and (max-width: 900px) {
                                    width: 100%;
                                }

                                & button {
                                    width: 100%;
                                    margin: auto auto .2rem auto;
                                }
                            }
                        }
                    </style>

                    <td id="td-buttons">
                        <div>
                            <button class="btn btn-primary bg-gradient"><a style="text-decoration: none; color: white;"
                                    href="{{route('admin.projects.show' , $project)}}"><i
                                        class="fas fa-eye fa-xs fa-fw"></i> View</a></button>

                            <button class="btn btn-secondary bg-gradient "><a
                                    style="text-decoration: none; color: white;"
                                    href="{{route('admin.projects.edit' , $project)}}"><i
                                        class="fas fa-pencil fa-xs fa-fw"></i> Edit</a></button>

                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalId">
                                <i class="fas fa-trash fa-xs fa-fw"></i> Delete
                            </button>

                            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="modalTitleId">
                                                Project: {{$project->title}}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">Are you committed to delete this project? Ater done, it
                                            won't be reversable</div>
                                        <div class="modal-footer d-flex flex-column">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>

                                            <form action="{{route('admin.projects.destroy', $project)}}" method="post"
                                                class="col-12">
                                                @csrf
                                                @method('DELETE')
                                                {{-- because it responds to static function delete into route --}}

                                                <button type="submit"
                                                    class="btn btn-danger bg-gradient col-6">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>
                @empty
                <tr class="">
                    <td scope="row" colspan="4">No record to show.</td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection