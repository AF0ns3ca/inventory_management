<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            ['name' => 'Luces de Navidad', 'description' => 'Luces de Navidad LED de colores.', 'picture' => 'https://m.media-amazon.com/images/I/61t8brplcXL._AC_SL1001_.jpg' , 'price' => 15.00, 'box_id' => 1],
            ['name' => 'Adornos de Navidad', 'description' => 'Set de adornos para árbol de Navidad.', 'picture' => 'https://m.media-amazon.com/images/I/81WOJxmGixL._AC_SL1500_.jpg' , 'price' => 10.00, 'box_id' => 1],
            ['name' => 'Corona de Navidad', 'description' => 'Corona de Navidad para la puerta.', 'picture' => 'https://m.media-amazon.com/images/I/81bfxLmru+L._AC_SL1500_.jpg' , 'price' => 20.00, 'box_id' => 1],
            ['name' => 'Calcetines de Navidad', 'description' => 'Calcetines de Navidad para regalos.', 'picture' => 'https://m.media-amazon.com/images/I/81RS-NHRAwL._AC_SL1500_.jpg' , 'price' => 5.00, 'box_id' => 1],
            ['name' => 'Velas de Navidad', 'description' => 'Velas aromáticas de Navidad.', 'picture' => 'https://m.media-amazon.com/images/I/71sSBu8985L._AC_SL1308_.jpg' , 'price' => 10.00, 'box_id' => 1],
            ['name' => 'Espumillón', 'description' => 'Espumillón de colores para decoración.', 'picture' => 'https://m.media-amazon.com/images/I/61NUaEnKe5L._AC_.jpg' , 'price' => 5.00, 'box_id' => 1],
            ['name' => 'Bolas de Navidad', 'description' => 'Bolas de Navidad para decoración del árbol.', 'picture' => 'https://m.media-amazon.com/images/I/81zkwWIhPzL._AC_SL1500_.jpg' , 'price' => 10.00, 'box_id' => 1],
            ['name' => 'Estrella de Navidad', 'description' => 'Estrella de Navidad para el árbol.', 'picture' => 'https://m.media-amazon.com/images/I/816erofXxHL._AC_SL1500_.jpg' , 'price' => 5.00, 'box_id' => 1],
            ['name' => 'Belén', 'description' => 'Belén con figuras de cerámica.', 'picture' => 'https://m.media-amazon.com/images/I/71gwPkrtJeL._AC_SL1500_.jpg' , 'price' => 30.00, 'box_id' => 1],

            ['name' => 'Ratón', 'description' => 'Ratón inalámbrico con sensor óptico.', 'picture' => 'https://m.media-amazon.com/images/I/61N+CzcA8vL._AC_SL1500_.jpg' , 'price' => 25.00, 'box_id' => 2],
            ['name' => 'Teclado', 'description' => 'Teclado mecánico retroiluminado.', 'picture' => 'https://m.media-amazon.com/images/I/71qunvZXYoL._AC_SL1500_.jpg' , 'price' => 70.00, 'box_id' => 2],
            ['name' => 'Disco duro', 'description' => 'Disco duro externo de 1TB.', 'picture' => 'https://m.media-amazon.com/images/I/81IVbhEpK0L._AC_SL1500_.jpg' , 'price' => 50.00, 'box_id' => 2],
            ['name' => 'Monitor', 'description' => 'Monitor LED de 24 pulgadas.', 'picture' => 'https://m.media-amazon.com/images/I/81xoR2wTjVL._AC_SL1500_.jpg' , 'price' => 100.00, 'box_id' => 2],
            ['name' => 'Cables USB', 'description' => 'Pack de cables USB de diferentes tipos.', 'picture' => 'https://m.media-amazon.com/images/I/71JZh0V8+RL._SL1050_.jpg' , 'price' => 10.00, 'box_id' => 2],
            ['name' => 'Cargador de móvil', 'description' => 'Cargador de móvil con USB-C.', 'picture' => 'https://m.media-amazon.com/images/I/51Mm5E4tn9L._AC_SL1500_.jpg' , 'price' => 15.00, 'box_id' => 2],
            ['name' => 'Auriculares', 'description' => 'Auriculares inalámbricos con cancelación de ruido.', 'picture' => 'https://m.media-amazon.com/images/I/610NdWdTLiL._AC_SL1500_.jpg' , 'price' => 50.00, 'box_id' => 2],
            ['name' => 'Altavoces', 'description' => 'Altavoces 2.1 con subwoofer.', 'picture' => 'https://m.media-amazon.com/images/I/61PovrPsdML._AC_SL1500_.jpg' , 'price' => 50.00, 'box_id' => 2],
            ['name' => 'Router', 'description' => 'Router wifi con 4 antenas.', 'picture' => 'https://m.media-amazon.com/images/I/51r2KOtbCeL._AC_SL1500_.jpg' , 'price' => 60.00, 'box_id' => 2],

                // Artículos para libros (box_id = 3)
            ['name' => 'Don Quijote de la Mancha', 'description' => 'Edición especial con ilustraciones, tapa dura.', 'picture' => 'https://m.media-amazon.com/images/I/61-D06GIMQL._SL1330_.jpg' , 'price' => 45.00, 'box_id' => 3],
            ['name' => 'Cien años de soledad', 'description' => 'Edición de coleccionista, tapa dura.', 'picture' => 'https://m.media-amazon.com/images/I/81QvZFjaI+L._SL1500_.jpg' , 'price' => 50.00, 'box_id' => 3],
            ['name' => 'Historia del tiempo', 'description' => 'Stephen Hawking, tapa blanda, edición actualizada.', 'picture' => 'https://m.media-amazon.com/images/I/71PxtZIcvML._SL1500_.jpg' , 'price' => 35.00, 'box_id' => 3],
            ['name' => 'El principito', 'description' => 'Edición bilingüe con ilustraciones originales, tapa dura.', 'picture' => 'https://m.media-amazon.com/images/I/71v3Xn5uEBL._SL1500_.jpg' , 'price' => 20.00, 'box_id' => 3],
            ['name' => 'Sapiens: De animales a dioses', 'description' => 'Yuval Noah Harari, tapa blanda.', 'picture' => 'https://m.media-amazon.com/images/I/811PTyrckTL._SL1500_.jpg' , 'price' => 40.00, 'box_id' => 3],
            ['name' => '1984', 'description' => 'George Orwell, edición de coleccionista, tapa dura.', 'picture' => 'https://m.media-amazon.com/images/I/71c3hMOvSfL._SL1500_.jpg' , 'price' => 30.00, 'box_id' => 3],
            ['name' => 'El arte de la guerra', 'description' => 'Sun Tzu, incluye comentarios y análisis, tapa dura.', 'picture' => 'https://m.media-amazon.com/images/I/61aTf+8b6qL._SL1500_.jpg' , 'price' => 25.00, 'box_id' => 3],
            ['name' => 'Frankenstein', 'description' => 'Mary Shelley, edición ilustrada, tapa dura.', 'picture' => 'https://m.media-amazon.com/images/I/718mHUNJxJL._SL1431_.jpg' , 'price' => 22.00, 'box_id' => 3],
            ['name' => 'Hamlet', 'description' => 'William Shakespeare, edición bilingüe, tapa dura.', 'picture' => 'https://m.media-amazon.com/images/I/81ObeXsUt1L._SL1500_.jpg' , 'price' => 28.00, 'box_id' => 3],
            ['name' => 'La divina comedia', 'description' => 'Dante Alighieri, ilustrada por Gustave Doré, tapa dura.', 'picture' => 'https://m.media-amazon.com/images/I/51znjP5Kk0L.jpg' , 'price' => 55.00, 'box_id' => 3],

                // Artículos para herramientas (box_id = 4)
            ['name' => 'Juego de destornilladores', 'description' => '20 piezas, incluye estrella y planos.', 'picture' => 'https://m.media-amazon.com/images/I/71mMtiUJMkL._AC_SL1319_.jpg' , 'price' => 25.00, 'box_id' => 4],
            ['name' => 'Martillo de carpintero', 'description' => 'Acero forjado, mango ergonómico.', 'picture' => 'https://m.media-amazon.com/images/I/71UWXIGvoDL._AC_SL1500_.jpg' , 'price' => 20.00, 'box_id' => 4],
            ['name' => 'Llave ajustable', 'description' => 'Acero inoxidable, 30 cm de longitud.', 'picture' => 'https://m.media-amazon.com/images/I/61LrhM5w7GL._AC_SL1500_.jpg' , 'price' => 15.00, 'box_id' => 4],
            ['name' => 'Taladro inalámbrico', 'description' => '18V, incluye batería y cargador.', 'picture' => 'https://m.media-amazon.com/images/I/71H7YTxANYL._AC_SL1500_.jpg' , 'price' => 90.00, 'box_id' => 4],
            ['name' => 'Sierra circular', 'description' => 'Disco de 7.25 pulgadas, guía láser.', 'picture' => 'https://m.media-amazon.com/images/I/71OoS+JQUvL._AC_SL1500_.jpg' , 'price' => 60.00, 'box_id' => 4],
            ['name' => 'Juego de brocas', 'description' => 'Para metal, madera y concreto, 50 piezas.', 'picture' => 'https://m.media-amazon.com/images/I/71dzyBIANCL._AC_SL1000_.jpg' , 'price' => 30.00, 'box_id' => 4],
            ['name' => 'Nivel láser', 'description' => 'Autonivelante, incluye trípode.', 'picture' => 'https://m.media-amazon.com/images/I/71STMrXlNhL._AC_SL1500_.jpg' , 'price' => 85.00, 'box_id' => 4],
            ['name' => 'Caja de herramientas', 'description' => 'Metálica, 5 compartimentos.', 'picture' => 'https://m.media-amazon.com/images/I/51+TLCB+1OL._AC_SL1024_.jpg' , 'price' => 40.00, 'box_id' => 4],
            ['name' => 'Juego de llaves hexagonales', 'description' => 'Acero aleado, 25 piezas.', 'picture' => 'https://m.media-amazon.com/images/I/811Tpe71QSL._AC_SL1500_.jpg' , 'price' => 22.00, 'box_id' => 4],
            ['name' => 'Cinta métrica', 'description' => '25 metros, carcasa resistente.', 'picture' => 'https://m.media-amazon.com/images/I/71HOj-6uKUL._SL1500_.jpg' , 'price' => 12.00, 'box_id' => 4],
        ]);
    }
}
