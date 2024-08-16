@extends('layout.master')

@section('content')
    <style>
        .card {
            width: 24rem;
            /* Increase the width of the card */
        }

        .card-img-top {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .card-body {
            padding: 1rem;
        }

        .card-title {
            font-size: 1.5rem;
            /* Adjust the font size of the title */
        }

        .card-subtitle {
            font-size: 1rem;
            /* Adjust the font size of the subtitle */
        }

        .card-text {
            font-size: 1rem;
            /* Adjust the font size of the text */

        }
    </style>
    <div class="container mt-5">
        <h1 class="mt-5 fw-bold">Semua Training</h1>
        <h5 class="text-secondary"> {{ count($trainingTopics) }} Topik Training</h5>
        <h5 class="fw-lighter fs-4">Lihat semua topik training dari beragam divisi detikLearning disini!</h5>
        <!-- Sort by Division Dropdown -->
        <div class="mt-4">
            <label for="sortByDivision" class="form-label fw-semibold">Sort by Division:</label>
            <select id="sortByDivision" class="form-select" onchange="sortByDivision()">
                <option value="all">All Divisions</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->name_division }}">{{ $division->name_division }}</option>
                @endforeach
            </select>
        </div>
        <div id="topicContainer" class="mt-5 row gap-5">
            @foreach ($trainingTopics as $topic)
                <div class="card rounded-5" data-division="{{ $divisions[$topic->id_division]->name_division }}">
                    <img class="card-img-top mt-3 rounded-4 mx-auto d-block"
                        src="{{ $topic->image ? Storage::url($topic->image) : 'https://via.placeholder.com/150' }}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $topic->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted mt-2">{{ $divisions[$topic->id_division]->name_division }}
                        </h6>
                        <p class="card-text mt-4 mb-4">{{ $topic->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function sortByDivision() {
            var selectedDivision = document.getElementById('sortByDivision').value;
            var container = document.getElementById('topicContainer');
            var cards = Array.from(container.getElementsByClassName('card'));

            cards.forEach(function(card) {
                var cardDivision = card.getAttribute('data-division');
                if (selectedDivision === 'all' || cardDivision === selectedDivision) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
@endsection
