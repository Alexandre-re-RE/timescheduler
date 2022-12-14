<?php ob_start(); ?>
<div class="card mt-4">
    <div class="card-header">Ajout d'un status</div>
    <div class="card-body">
        
      
        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="code" name="code">
                <label for="code">Nom du code</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name">
                <label for="name">Nom du status</label>
            </div>

            <div class="form-floating mb-3">
            <input type="date" class="form-control" id="created_at" name="created_at" >
                <label for="name">Nom de création</label>
            </div>

            <div class="form-floating mb-3">
            <input type="date" class="form-control" id="updated_at" name="updated_at" >
                <label for="name">Nom de mise à jour</label>
            </div>
            
                
                
                
                
            <button type="submit" class="btn btn-dark float-end">Valider</button>
        </form>
    </div>
</div>
<?php $content = ob_get_clean() ?>

<?php require_once TEMPLATES . 'Layout/default.php'; ?>

