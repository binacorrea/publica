
    <section>
        <div id="form">
            <div class="rw">
                <div id="formulario" style="display: none;">
                    <form action="controlador.php?acao=insere_jogador" method="POST">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Time</label>
                            <input type="number" name="time" class="form-control" id="time">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="button" onclick="$('#formulario').hide();$('#container-table').show();" class="btn btn-danger">cancelar</button>
                    </form>
                </div>
            </div>
        </div>

    </section>