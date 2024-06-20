@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Functions') }}</div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" id="addCompetitionBtn">Add new competition</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="accordion" id="accordionCompetitions">
                        @foreach ($competitions as $competition)
                                            <div class="accordion-item" id="competition-{{ $competition->id }}">
                                                <h2 class="accordion-header" id="headingCompetition{{ $competition->id }}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseCompetition{{ $competition->id }}" aria-expanded="true"
                                                        aria-controls="collapseCompetition{{ $competition->id }}">
                                                        <b>{{ $competition->name }} | </b>

                                                        @if (!empty($competition->available_languages))
                                                                                        @php
                                                                                            $languages = is_string($competition->available_languages) ? json_decode($competition->available_languages) : $competition->available_languages;
                                                                                        @endphp
                                                                                        @foreach ($languages as $language)
                                                                                            <span type="button" class="btn btn-success">{{ $language }}</span>
                                                                                            <b> | </b>
                                                                                        @endforeach
                                                        @endif

                                                        <span type="button" class="btn btn-secondary">{{ $competition->location }}</span>
                                                        <b> | </b>
                                                        <span type="button" class="btn btn-secondary">{{ $competition->year }}</span>
                                                        <b> | </b>
                                                        <span type="button" class="btn btn-primary" id="addRoundBtn" data-bs-toggle="modal"
                                                            data-bs-target="#addRoundModal" data-id="{{ $competition->id }}">Add
                                                            round</span>
                                                        <b> | </b>
                                                        <span type="button" class="btn btn-danger delete-competition-button"
                                                            data-id="{{ $competition->id }}">Delete</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseCompetition{{ $competition->id }}" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingCompetition{{ $competition->id }}"
                                                    data-bs-parent="#accordionCompetitions">
                                                    <div class="accordion-body">
                                                        @foreach ($competition->rounds as $round)
                                                            <div class="accordion-item" id="round-{{ $round->id }}">
                                                                <h2 class="accordion-header" id="headingRound{{ $round->id }}">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseRound{{ $round->id }}" aria-expanded="true"
                                                                        aria-controls="collapseRound{{ $round->id }}">
                                                                        <b>{{ $round->name }}</b>
                                                                        <b> | </b>
                                                                        <span type="button" class="btn btn-success">Max Points:
                                                                            {{ $round->max_points }}</span>
                                                                        <b> | </b>
                                                                        <span type="button" class="btn btn-secondary">{{ $round->date }}</span>
                                                                        <b> | </b>
                                                                        <span type="button" class="btn btn-primary">Add participants</span>
                                                                        <b> | </b>
                                                                        <span type="button" class="btn btn-danger delete-round-button"
                                                                            data-id="{{ $round->id }}">Delete</span>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseRound{{ $round->id }}" class="accordion-collapse collapse show"
                                                                    aria-labelledby="headingRound{{ $round->id }}"
                                                                    data-bs-parent="#collapseCompetition{{ $competition->id }}">
                                                                    <div class="accordion-body">
                                                                        <ul>
                                                                            @foreach ($round->participants as $participant)
                                                                                <div class="accordion-item" id="participant-{{ $participant->id }}">
                                                                                    <h2 class="accordion-header"
                                                                                        id="headingParticipant{{ $participant->id }}">
                                                                                        <button class="accordion-button" type="button"
                                                                                            data-bs-toggle="collapse"
                                                                                            data-bs-target="#collapseParticipant{{ $participant->id }}"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapseParticipant{{ $participant->id }}">
                                                                                            <b>{{ $participant->name }}</b>
                                                                                            <b> | </b>
                                                                                            <!-- TODO:: Add points here -->
                                                                                            <!-- <span type="button" class="btn btn-success">{{ $participant->points }}</span> -->
                                                                                            <span type="button"
                                                                                                class="btn btn-danger delete-participant-button"
                                                                                                data-round-id="{{ $round->id }}"
                                                                                                data-participant-id="{{ $participant->id }}">Delete</span>
                                                                                        </button>
                                                                                    </h2>
                                                                                    <div id="collapseParticipant{{ $participant->id }}"
                                                                                        class="accordion-collapse collapse"
                                                                                        aria-labelledby="headingParticipant{{ $participant->id }}"
                                                                                        data-bs-parent="#collapseRound{{ $round->id }}">
                                                                                        <div class="accordion-body">
                                                                                            <p>Email: {{ $participant->email }}</p>
                                                                                            <p>Phone: {{ $participant->phone }}</p>
                                                                                            <p>Address: {{ $participant->address }}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCompetitionModal" tabindex="-1" aria-labelledby="addCompetitionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCompetitionModalLabel">Add New Competition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addCompetitionForm">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="competitionName" class="form-label">Competition Name</label>
                        <input type="text" class="form-control" id="competitionName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="competitionDate" class="form-label">Competition Year</label>
                        <input type="number" class="form-control" id="competitionDate" name="year"
                            value="{{ now()->year }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="competitionLocation" class="form-label">Competition Location</label>
                        <input type="text" class="form-control" id="competitionLocation" name="location" required>
                    </div>
                    <div class="mb-3">
                        <label for="competitionLanguages" class="form-label">Available Languages</label>
                        <input type="text" class="form-control" id="competitionLanguages" name="available_languages"
                            placeholder="hu, en" value="hu, en" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submitAddCompetitionBtn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Round Modal -->
<div class="modal fade" id="addRoundModal" tabindex="-1" aria-labelledby="addRoundModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoundModalLabel">Add New Round</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addRoundForm">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="competitionId" name="competition_id" value="{{ $competition->id }}">
                    <div class="mb-3">
                        <label for="roundName" class="form-label">Round Name</label>
                        <input type="text" class="form-control" id="roundName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="roundDate" class="form-label">Round Date</label>
                        <input type="date" class="form-control" id="roundDate" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="roundMaxPoints" class="form-label">Max Points</label>
                        <input type="number" class="form-control" id="roundMaxPoints" name="max_points" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submitAddRoundBtn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#addCompetitionBtn').click(function () {
            $('#addCompetitionModal').modal('show');
        });

        $('#addRoundBtn').click(function () {
            $('#addRoundModal').modal('show');
        });

        $('#submitAddCompetitionBtn').click(function (e) {
            e.preventDefault();

            var name = $('#competitionName').val();
            var year = $('#competitionDate').val();
            var location = $('#competitionLocation').val();
            var languagesInput = $('#competitionLanguages').val().trim();
            var languages = JSON.stringify(languagesInput.split(',').map(item => item.trim()));

            if (name.trim() === '' || year.trim() === '' || location.trim() === '' || languagesInput.trim() === '') {
                alert('Please fill in all required fields.');
                return;
            }

            var token = '{{ csrf_token() }}';

            $.ajax({
                type: 'POST',
                url: '{{ route('competition.store') }}',
                data: {
                    name: name,
                    year: year,
                    location: location,
                    available_languages: languages,
                    _token: token
                },
                success: function (data) {
                    $('#addCompetitionModal').modal('hide');
                    var languagesHtml = '';

                    var parsedLanguages = JSON.parse(data.available_languages);

                    if (Array.isArray(parsedLanguages) && parsedLanguages.length > 0) {
                        parsedLanguages.forEach(function (language, index) {
                            languagesHtml += '<span type="button" class="btn btn-success">' + language + '</span>';
                            if (index < parsedLanguages.length - 1) {
                                languagesHtml += '<b> | </b>';
                            }
                        });
                    }

                    $('#accordionCompetitions').append(
                        '<div class="accordion-item" id="competition-' + data.id + '">' +
                        '<h2 class="accordion-header" id="headingCompetition' + data.id + '">' +
                        '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCompetition' + data.id + '" aria-expanded="true" aria-controls="collapseCompetition' + data.id + '">' +
                        '<b>' + data.name + ' | </b>' +
                        languagesHtml +
                        '<b> | </b> <span type="button" class="btn btn-secondary">' + data.location + '</span>' +
                        '<b> | </b>' +
                        '<span type="button" class="btn btn-secondary">' + data.year + '</span>' +
                        '<span type="button" class="btn btn-danger delete-competition-button" data-id="' + data.id + '">Delete</span>' +
                        '</button>' +
                        '</h2>' +
                        '<div id="collapseCompetition' + data.id + '" class="accordion-collapse collapse show" aria-labelledby="headingCompetition' + data.id + '" data-bs-parent="#accordionCompetitions">' +
                        '<div class="accordion-body">' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    );

                    $('#addCompetitionForm')[0].reset();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        $(document).on('click', '.delete-competition-button', function () {
            var competitionId = $(this).data('id');
            var $competitionItem = $('#competition-' + competitionId);

            $.ajax({
                url: '{{ url('competitions') }}/' + competitionId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        $competitionItem.remove();
                        // alert('Successfully deleted competition.');
                    } else {
                        alert('Failed to delete competition.');
                    }
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.status + ' - ' + xhr.statusText);
                }
            });
        });

        $(document).on('click', '.delete-round-button', function () {
            var roundId = $(this).data('id');
            var $roundItem = $('#round-' + roundId);

            $.ajax({
                url: '{{ url('rounds') }}/' + roundId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        $roundItem.remove();
                        // alert('Successfully deleted round.');
                    } else {
                        alert('Failed to delete round.');
                    }
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.status + ' - ' + xhr.statusText);
                }
            });
        });

        $(document).on('click', '.delete-participant-button', function () {
            var roundId = $(this).data('round-id');
            var participantId = $(this).data('participant-id');
            var $participantItem = $('#participant-' + participantId);

            $.ajax({
                url: '{{ url('rounds') }}/' + roundId + '/participants/' + participantId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        $participantItem.remove();
                        // alert('Successfully deleted participant from round.');
                    } else {
                        alert('Failed to delete participant from round.');
                    }
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.status + ' - ' + xhr.statusText);
                }
            });
        });

        $(document).on('click', '#addRoundBtn', function () {
            var competitionId = $(this).data('id');
            $('#competitionId').val(competitionId);
        });

        $('#submitAddRoundBtn').click(function (e) {
            e.preventDefault();

            var competitionId = $('#competitionId').val();
            var name = $('#roundName').val();
            var date = $('#roundDate').val();
            var maxPoints = $('#roundMaxPoints').val();
            var token = '{{ csrf_token() }}';

            $.ajax({
                type: 'POST',
                url: '{{ route('round.store') }}',
                data: {
                    competition_id: competitionId,
                    name: name,
                    date: date,
                    max_points: maxPoints,
                    _token: token
                },
                success: function (data) {
                    $('#addRoundModal').modal('hide');
                    $(document).on('hidden.bs.modal', function (e) {
                        $('.modal-backdrop').remove();
                    });
                    var newRoundHtml =
                        '<div class="accordion-item">' +
                        '<h2 class="accordion-header" id="headingRound' + data.id + '">' +
                        '<button class="accordion-button" type="button" data-bs-toggle="collapse" ' +
                        'data-bs-target="#collapseRound' + data.id + '" aria-expanded="true" ' +
                        'aria-controls="collapseRound' + data.id + '">' +
                        '<b>' + data.name + '</b>' +
                        '<b> | </b>' +
                        '<span type="button" class="btn btn-success">Max Points: ' + data.max_points + '</span>' +
                        '<b> | </b>' +
                        '<span type="button" class="btn btn-secondary">' + data.date + '</span>' +
                        '<b> | </b>' +
                        '<span type="button" class="btn btn-primary">Add participants</span>' +
                        '<b> | </b> ' +
                        '<span type="button" class="btn btn-danger">Delete</span>' +
                        '</button>' +
                        '</h2>' +
                        '<div id="collapseRound' + data.id + '" class="accordion-collapse collapse show" ' +
                        'aria-labelledby="headingRound' + data.id + '" data-bs-parent="#accordionCompetitions">' +
                        '<div class="accordion-body">' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                    $('#competition-' + competitionId + ' .accordion-body').append(newRoundHtml);

                    $('#roundName').val('');
                    $('#roundDate').val('');
                    $('#roundMaxPoints').val('');
                    $('#competitionId').val('');
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.status + ' - ' + xhr.statusText);
                }
            });
        });
    });
</script>


@endsection