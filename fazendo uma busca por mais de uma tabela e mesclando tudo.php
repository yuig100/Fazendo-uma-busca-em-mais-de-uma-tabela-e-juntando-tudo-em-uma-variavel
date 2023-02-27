<?php

public function pesquisar(Request $request)
    {
        $query = $request->input('query');


        // Buscando todo o conteudo das tabelas
        $tabela1 = Tabela::all();

        $tabela2 = Tabela::all();

        $tabela3 = Tabela::all();

        // Combina os resultados em uma única coleção
        $tabelaAll = collect();

        if ($tabela1->isNotEmpty()) {
            foreach ($tabela1 as $p) {
                $tabelaAll[] = [
                    //exemplo de campos
                    'id' => $p->id,
                    'name' => $p->name,
                    'email' => $p->email
                ];
            }
        }

        if ($tabela2->isNotEmpty()) {
            foreach ($tabela2 as $p) {
                $tabelaAll[] = [
                    //exemplo de campos
                    'campo1' => $p->campo1,
                    'campo2' => $p->campo2,
                    'campo3' => $p->campo3
                ];
            }
        }

        if ($tabela3->isNotEmpty()) {
            foreach ($tabela3 as $p) {
                $tabelaAll[] = [
                    //exemplo de campos
                    'campo4' => $p->campo4,
                    'campo5' => $p->campo5,
                    'campo6' => $p->campo6
                ];
            }
        }

        //Caso precise verificar todos os items
        //dd($tabelaAll);


        if ($tabelaAll->isNotEmpty()) {
            // Cria a instancia do paginador com os resultados mesclados
            return view('Sua view', ['$tabelaAll' => $tabelaAll]);
        } else {
            return redirect('/');
        }

?>
