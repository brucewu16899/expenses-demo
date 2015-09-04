@extends('app')

@section('content')

    <h1>List of Expenses</h1>

    <div class="alerts">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    </div>

    @if(count($expenses) >= 1)
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td><td>Description</td><td>Amount</td><td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->id }}</td>
                    <td><a href="{{ route('expenses.show', $expense->id) }}">{{ $expense->description }}</a></td>
                    <td>$ {{ $expense->base_amount }}</td>
                    <td>
                        <a class="btn btn-default btn-xs" href="{{ route('expenses.show', $expense->id) }}">Edit</a>
                        <a class="btn btn-warning btn-xs delete-button" data-id="{{ $expense->id }}" href="#">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        No expenses yet, go to a restaurant or something!
    @endif
@endsection

@section('bottomscripts')
    <script>
        $(document).ready(function() {

            $(".delete-button").click(function(e) {

                id = $(this).data('id');
                row = $(this).closest('tr');

                $.ajax({
                    url: '/expenses/'+id,
                    type: 'DELETE',
                    beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                    success: function(result) {
                        $('.alerts').append('<div class="alert alert-success">Delete successful</div>');
                        row.remove();
                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 1200);
                    }
                });
            });

            // fancy auto-closing alert
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 1200);
        });
    </script>
@endsection