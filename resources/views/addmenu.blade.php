@extends('layouts.app')

@section('content')

<div class="container mt-4">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-sm-6 col-md-8">
        <h3 class="mb-4">Menu</h3>
            <table class="table table-bordered">
                <tbody>
                    @foreach($viewMenu as $index => $menu)
                        <tr>
                            <th scope="row">{{ (int)$index + 1 }}</th>
                            <td class="col-sm-6 col-md-8">{{ $menu->food_name }}</td>
                            <td class="col-6 col-md-4"><a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-danger">Edit</a> Created at: {{ $menu->date }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-6 col-md-4">
            <h3>Add Menu</h3>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-container bg-dark p-3 rounded" style="max-width: 400px; color: white;">
                <form class="row g-3" action="/add-menu" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label for="item_type" class="form-label">Item Type</label>
                        <select class="form-control" name="item_type" id="item_type">
                            <option value=""></option>
                            <option value="Dimsum">Dimsum</option>
                            <option value="Ala Carte">Ala Carte</option>
                            <option value="Drink">Drink</option>
                            <option value="Dessert">Dessert</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="food_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="food_name" name="food_name" placeholder="Enter Food Name">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="image_path" class="form-label">Upload File</label>
                        <input type="file" class="form-control-file" id="image_path" name="image_path">
                        @error('file')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-danger">Add Menu</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.classList.add('fade-out');
                setTimeout(function() {
                    successAlert.remove();
                }, 1000);
            }
        }, 5000);
    });
</script>

<style>
    .fixed-top {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        margin: 0;
    }
    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-out;
    }
</style>

@endsection
