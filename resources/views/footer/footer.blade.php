<footer class="bg-primary text-white py-4 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>À propos</h5>
                <p>CVthèque - Votre plateforme de gestion de compétences et métiers professionnels.</p>
            </div>
            <div class="col-md-4">
                <h5>Liens rapides</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('competences.index') }}" class="text-white">Compétences</a></li>
                    <li><a href="{{ route('metiers.index') }}" class="text-white">Métiers</a></li>
                    <li><a href="#" class="text-white">Professionnels</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-envelope"></i> contact@cvtheque.fr</li>
                    <li><i class="fas fa-phone"></i> +33 1 23 45 67 89</li>
                    <li><i class="fas fa-map-marker-alt"></i> Paris, France</li>
                </ul>
            </div>
        </div>
        <hr class="bg-white">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} CVthèque. Tous droits réservés.</p>
        </div>
    </div>
</footer>
