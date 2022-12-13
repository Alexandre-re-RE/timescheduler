<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créations d'activites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body class="bg-light vh-100">
    <main role="main" class="h-100">
        <div class="container h-100">
            <div class="d-flex flex-column align-items-center justify-content-center h-100">
                <div class="card w-100" style="max-width: 600px;">
                    <div class="card-header">Créations D'activites</div>
                    <div class="card-body">
                        <form method="post" action="add.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="inputTitle" name="inputTitle">
                                        <label for="inputTitle">Titre</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="inputDescription" name="inputDescription">
                                        <label for="inputDescription">Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" id="inputPriority" name="inputPriority">
                                    <option selected>Veuillez choisir une priorité </option>
                                    <option value="1">normal</option>
                                    <option value="2">Urgent</option>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="inputStartDate" name="inputStartDate">
                                <label for="date">Date de commencement</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="inputEndDate" name="inputEndDate">
                                <label for="date">Date de fin prévu</label>
                            </div>
                            <button type="submit" class="btn btn-dark float-end">Valider</button>
                            <button type="submit" class="btn btn-dark float-end" hidden id="tasks">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="./public/js/register-validation.js"></script>
</body>

</html>

if id.ligne isset {
condition 1
sinon
condition 2
}