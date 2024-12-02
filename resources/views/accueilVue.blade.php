<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CVthèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('accueil') }}">Accueil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('competences.index') }}">Compétences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('metiers.index') }}">Métiers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('professionnels.index') }}">Professionnels</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @hasSection('contenu')
            @yield('contenu')
        @else
            <div class="container">
                <h1 class="text-center mb-4">Tableau de bord CVthèque</h1>
                
                <!-- Cartes statistiques -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Compétences</div>
                            <div class="card-body">
                                <h2 class="card-title">{{ $stats['competences'] }}</h2>
                                <p class="card-text">Compétences enregistrées</p>
                                <a href="{{ route('competences.index') }}" class="btn btn-light">Gérer</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Métiers</div>
                            <div class="card-body">
                                <h2 class="card-title">{{ $stats['metiers'] }}</h2>
                                <p class="card-text">Métiers référencés</p>
                                <a href="{{ route('metiers.index') }}" class="btn btn-light">Gérer</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-header">Professionnels</div>
                            <div class="card-body">
                                <h2 class="card-title">{{ $stats['professionnels'] }}</h2>
                                <p class="card-text">Professionnels inscrits</p>
                                <a href="{{ route('professionnels.index') }}" class="btn btn-light">Gérer</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graphique -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Statistiques globales
                            </div>
                            <div class="card-body">
                                <canvas id="statsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ajout de Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('statsChart');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Compétences', 'Métiers', 'Professionnels'],
                        datasets: [{
                            label: 'Nombre d\'entrées',
                            data: [
                                {{ $stats['competences'] }}, 
                                {{ $stats['metiers'] }}, 
                                {{ $stats['professionnels'] }}
                            ],
                            backgroundColor: [
                                'rgba(13, 110, 253, 0.5)',
                                'rgba(25, 135, 84, 0.5)',
                                'rgba(13, 202, 240, 0.5)'
                            ],
                            borderColor: [
                                'rgb(13, 110, 253)',
                                'rgb(25, 135, 84)',
                                'rgb(13, 202, 240)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            </script>
        @endif
    </main>

    @include('footer.footer')

    <!-- JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>