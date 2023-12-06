function getDelete(delete_id, model, route) {
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: route,
                method: "POST",
                data: {
                    delete_id: delete_id,
                    model: model
                },
                success: function (data) {
                    if (data.status == 200) {
                        Swal.fire(
                            'Excluido!',
                            'Seu arquivo foi excluído.',
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                    } else {
                        Swal.fire(
                            'Erro!',
                            'Erro ao excluir o arquivo.',
                            'error'
                        )
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    })
}