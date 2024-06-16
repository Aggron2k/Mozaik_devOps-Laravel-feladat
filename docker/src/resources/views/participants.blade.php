@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Functions') }}</div>

                <div class="card-body">
                    <button type="button" class="btn btn-primary" id="addParticipantBtn">Add new participant</button>
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Participants') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participants as $participant)
                                <tr>
                                    <th scope="row">{{ $participant->id }}</th>
                                    <td>{{ $participant->name }}</td>
                                    <td>{{ $participant->email }}</td>
                                    <td>{{ $participant->phone }}</td>
                                    <td>{{ $participant->address }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $participant->id }})">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addParticipantModal" tabindex="-1" aria-labelledby="addParticipantModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addParticipantModalLabel">Add New Participant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addParticipantForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="participantName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="participantName" required>
                    </div>
                    <div class="mb-3">
                        <label for="participantEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="participantEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="participantPhone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="participantPhone" required>
                    </div>
                    <div class="mb-3">
                        <label for="participantAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="participantAddress" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#addParticipantBtn').click(function() {
            $('#addParticipantModal').modal('show');
        });

        $('#addParticipantForm').submit(function(e) {
            e.preventDefault();

            var name = $('#participantName').val();
            var email = $('#participantEmail').val();
            var phone = $('#participantPhone').val();
            var address = $('#participantAddress').val();
            var token = '{{ csrf_token() }}';

            $.ajax({
                type: 'POST',
                url: '/participants',
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    address: address,
                    _token: token
                },
                success: function(data) {
                    $('#addParticipantModal').modal('hide');
                    $('tbody').append('<tr><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.email + '</td><td>' + data.phone + '</td><td>' + data.address + '</td></tr>');
                    $('#participantName').val('');
                    $('#participantEmail').val('');
                    $('#participantPhone').val('');
                    $('#participantAddress').val('');
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>

@endsection
