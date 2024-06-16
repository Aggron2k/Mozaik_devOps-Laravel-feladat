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
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingCompetition{{ $competition->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseCompetition{{ $competition->id }}" aria-expanded="true"
                                        aria-controls="collapseCompetition{{ $competition->id }}">
                                        <b>{{ $competition->name }} | </b>
                                        @if ($competition->available_languages)
                                            @foreach (json_decode($competition->available_languages) as $language)
                                                <span type="button" class="btn btn-success">{{ $language }}</span>
                                                <b> | </b>

                                            @endforeach
                                        @endif

                                        <span type="button" class="btn btn-secondary">{{$competition->location}}</span>
                                        <b> | </b>
                                        <span type="button" class="btn btn-secondary">{{$competition->year}}</span>

                                    </button>
                                </h2>
                                <div id="collapseCompetition{{ $competition->id }}" class="accordion-collapse collapse show"
                                    aria-labelledby="headingCompetition{{ $competition->id }}"
                                    data-bs-parent="#accordionCompetitions">
                                    <div class="accordion-body">
                                        @foreach ($competition->rounds as $round)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingRound{{ $round->id }}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseRound{{ $round->id }}" aria-expanded="true"
                                                        aria-controls="collapseRound{{ $round->id }}">
                                                        <b>{{ $round->name}}</b>
                                                        <b> | </b>
                                                        <span type="button" class="btn btn-success">Max Points:
                                                            {{$round->max_points}}</span>
                                                        <b> | </b>
                                                        <span type="button" class="btn btn-secondary">{{$round->date}}
                                                        </span>

                                                    </button>
                                                </h2>
                                                <div id="collapseRound{{ $round->id }}" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingRound{{ $round->id }}"
                                                    data-bs-parent="#collapseCompetition{{ $competition->id }}">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            @foreach ($round->participants as $participant)
                                                                <div class="accordion-item">
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
                                                                            <!-- <span type="button"
                                                                                                        class="btn btn-success">{{ $participant->points }}
                                                                                                    </span> -->

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
            <div class="modal-body">
                <form id="addCompetitionForm">
                    @csrf
                    <div class="mb-3">
                        <label for="competitionName" class="form-label">Competition Name</label>
                        <input type="text" class="form-control" id="competitionName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="competitionDate" class="form-label">Competition Year</label>
                        <input type="number" class="form-control" id="competitionDate" name="year" required>
                    </div>
                    <div class="mb-3">
                        <label for="competitionLocation" class="form-label">Competition Location</label>
                        <input type="text" class="form-control" id="competitionLocation" name="location" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="competitionLanguages" class="form-label">Available Languages</label>
                        <input type="text" class="form-control" id="competitionLanguages" name="available_languages">
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="submitAddCompetitionBtn" class="btn btn-primary">Save</button>
      </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#addCompetitionBtn').click(function () {
            $('#addCompetitionModal').modal('show');
        });

        $('#addCompetitionForm').submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var formData = form.serialize();
            // console.log(formData);

            $.ajax({
                url: '{{ route('competition.store') }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#addCompetitionModal').modal('hide');
                    location.reload();
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

@endsection