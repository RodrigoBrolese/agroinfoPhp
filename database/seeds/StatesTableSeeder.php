<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO states (id, name, initials, country_id, fone_code) VALUES
                (1, 'Acre', 'AC', 1, '".json_encode(array_values([68]), JSON_FORCE_OBJECT)."'),
                (2, 'Alagoas', 'AL', 1, '".json_encode(array_values([82]), JSON_FORCE_OBJECT)."'),
                (3, 'Amazonas', 'AM', 1, '".json_encode(array_values([97,92]), JSON_FORCE_OBJECT)."'),
                (4, 'Amapá', 'AP', 1, '".json_encode(array_values([96]), JSON_FORCE_OBJECT)."'),
                (5, 'Bahia', 'BA', 1, '".json_encode(array_values([77,75,73,74,71]), JSON_FORCE_OBJECT)."'),
                (6, 'Ceará', 'CE', 1, '".json_encode(array_values([88,85]), JSON_FORCE_OBJECT)."'),
                (7, 'Distrito Federal', 'DF', 1, '".json_encode(array_values([61]), JSON_FORCE_OBJECT)."'),
                (8, 'Espírito Santo', 'ES', 1, '".json_encode(array_values([28,27]), JSON_FORCE_OBJECT)."'),
                (9, 'Goiás', 'GO', 1, '".json_encode(array_values([62,64,61]), JSON_FORCE_OBJECT)."'),
                (10, 'Maranhão', 'MA', 1, '".json_encode(array_values([99,98]), JSON_FORCE_OBJECT)."'),
                (11, 'Minas Gerais', 'MG', 1, '".json_encode(array_values([34,37,31,33,35,38,32]), JSON_FORCE_OBJECT)."'),
                (12, 'Mato Grosso do Sul', 'MS', 1, '".json_encode(array_values([67]), JSON_FORCE_OBJECT)."'),
                (13, 'Mato Grosso', 'MT', 1, '".json_encode(array_values([65,66]), JSON_FORCE_OBJECT)."'),
                (14, 'Pará', 'PA', 1, '".json_encode(array_values([91,94,93]), JSON_FORCE_OBJECT)."'),
                (15, 'Paraíba', 'PB', 1, '".json_encode(array_values([83]), JSON_FORCE_OBJECT)."'),
                (16, 'Pernambuco', 'PE', 1, '".json_encode(array_values([81,87]), JSON_FORCE_OBJECT)."'),
                (17, 'Piauí', 'PI', 1, '".json_encode(array_values([89,86]), JSON_FORCE_OBJECT)."'),
                (18, 'Paraná', 'PR', 1, '".json_encode(array_values([43,41,42,44,45,46]), JSON_FORCE_OBJECT)."'),
                (19, 'Rio de Janeiro', 'RJ', 1, '".json_encode(array_values([24,22,21]), JSON_FORCE_OBJECT)."'),
                (20, 'Rio Grande do Norte', 'RN', 1, '".json_encode(array_values([84]), JSON_FORCE_OBJECT)."'),
                (21, 'Rondônia', 'RO', 1, '".json_encode(array_values([69]), JSON_FORCE_OBJECT)."'),
                (22, 'Roraima', 'RR', 1, '".json_encode(array_values([95]), JSON_FORCE_OBJECT)."'),
                (23, 'Rio Grande do Sul', 'RS', 1, '".json_encode(array_values([53,54,55,51]), JSON_FORCE_OBJECT)."'),
                (24, 'Santa Catarina', 'SC', 1, '".json_encode(array_values([47,48,49]), JSON_FORCE_OBJECT)."'),
                (25, 'Sergipe', 'SE', 1, '".json_encode(array_values([79]), JSON_FORCE_OBJECT)."'),
                (26, 'São Paulo', 'SP', 1, '".json_encode(array_values([11,12,13,14,15,16,17,18,19]), JSON_FORCE_OBJECT)."'),
                (27, 'Tocantins', 'TO', 1, '".json_encode(array_values([63]), JSON_FORCE_OBJECT)."');
        ");

    }
}
