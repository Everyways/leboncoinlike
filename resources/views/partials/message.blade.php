

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="message" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form id="messageForm" method="POST" action="{{ $url }}">
                @csrf
                <div class="modal-body">

                    @guest
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Vous n'êtes pas connecté. Votre message sera modéré avant expédition.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endguest

                    <input id="id" name="id" type="hidden" value="{{ isset($ad) ? $ad->id : '' }}">

                    <div class="form-group">
                        <label for="texte">Entrez ici votre message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required>{{ old('texte', isset($value) ? $value : '') }}</textarea>
                        <div id="messageError" class="invalid-feedback"></div>
                    </div>

                    @guest
                        <div class="form-group">
                            <label for="email">Votre email pour vous contacter</label>
                            <input type="email" class="form-control" name=email id="email" required>
                            <div id="emailError" class="invalid-feedback"></div>
                        </div>
                    @endguest

                </div>
                <div class="modal-footer">
                    <div id="buttons">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                    <i id="icon" class="fas fa-spinner fa-pulse fa-2x" style="display: none"></i>
                </div>
            </form>
        </div>
    </div>
</div>

