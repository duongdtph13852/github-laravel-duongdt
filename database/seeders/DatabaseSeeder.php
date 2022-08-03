<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $dataRole = [
            [
                "admin"=> 1,
                "nguoi_dung"=> 2,
                "id_user" => 1,
            ]
            ];
        $dataDanhmuc = [
            [
                "name_cate" => "quan ao nam"
            ],
            [
                "name_cate" => "quan ao nu"
            ],
            [
                "name_cate" => "quan ao the thao"
            ],
        ];
        $dataSanPham = [
            [
                "name" => "ao polo",
                "price" => "100.000 vnd",
                "mo_ta" => "san pham depppp",
                "so_luong" => 2,
                "id_danhmuc" => 1,
            ],
            [
                "name" => "vay",
                "price" => "100.000 vnd",
                "mo_ta" => "san pham depppp",
                "so_luong" => 2,
                "id_danhmuc" => 2
            ],
            [
                "name" => "ao da bong",
                "price" => "200.000 vnd",
                "mo_ta" => "san pham depppp",
                "so_luong" => 2,
                "id_danhmuc" => 3
            ]
            ];
        $dataKhuyenMai = [
            [
                "ma_kh" => "123",
                "id_sanpham" => 1,
                "so_luong" => 2
            ],
            [
                "ma_kh" => "1234",
                "id_sanpham" => 2,
                "so_luong" => 2
            ],
            [
                "ma_kh" => "12345",
                "id_sanpham" => 3,
                "so_luong" => 2
            ]
            ];
        $dataBill = [
            [
                "name" => "bill quan ao nam",
                "dia_chi" => "ha noi",
                "sdt" => "0345421251",
                "tong_tien" => 100.000,
                "id_user" => 1,
            ]
            ];
        $dataSize = [
            [
                "size"=> "30",
                "id_sanpham"=> 1
            ],
            [
                "size"=> "20",
                "id_sanpham"=> 2
            ],
            [
                "size"=> "10",
                "id_sanpham"=> 3
            ]
            ];
        $dataMau = [
            [
                "mau_sac"=> "do",
                "id_sanpham"=> 1
            ],
            [
                "mau_sac"=> "xanh",
                "id_sanpham"=> 2
            ],
            [
                "mau_sac"=> "vang",
                "id_sanpham"=> 3
            ]
            ];
        $dataUser = [
            [
                "name"=> "admin2",
                "email"=>"admin12345678900@gmail.com",
                "password"=> Hash::make('123456'),
            ]
            ];
       $dataHoa_don = [
            [
                "name"=>"áo đá bóng",
                "id_san_pham"=>3,
                "price"=> "200.000 vnd",
                "id_user"=>1,
                "id_tong"=>1,
                "so_luong"=>2,
            ]
            ];
            DB::table('_roles')->insert($dataRole);
            DB::table('danh_mucs')->insert($dataDanhmuc);
            DB::table('san_phams')->insert($dataSanPham);
            DB::table('khuyen_mais')->insert($dataKhuyenMai);
            DB::table('hoa_dons')->insert($dataBill);
            DB::table('sizes')->insert($dataSize);
            DB::table('mau_sacs')->insert($dataMau);
            DB::table('users')->insert($dataUser);
            DB::table('chi_tiet_hoa_don')->insert($dataHoa_don);
    }
}
