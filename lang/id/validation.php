<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
    'accepted'             => ':Attribute harus diterima.',
    'accepted_if'          => ':Attribute harus diterima ketika :other berisi :value.',
    'active_url'           => ':Attribute bukan URL yang valid.',
    'after'                => ':Attribute harus berisi tanggal setelah :date.',
    'after_or_equal'       => ':Attribute harus berisi tanggal setelah atau sama dengan :date.',
    'alpha'                => ':Attribute hanya boleh berisi huruf.',
    'alpha_dash'           => ':Attribute hanya boleh berisi huruf, angka, strip, dan garis bawah.',
    'alpha_num'            => ':Attribute hanya boleh berisi huruf dan angka.',
    'array'                => ':Attribute harus berisi sebuah array.',
    'before'               => ':Attribute harus berisi tanggal sebelum :date.',
    'before_or_equal'      => ':Attribute harus berisi tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'array'   => ':Attribute harus memiliki :min sampai :max anggota.',
        'file'    => ':Attribute harus berukuran antara :min sampai :max kilobita.',
        'numeric' => ':Attribute harus bernilai antara :min sampai :max.',
        'string'  => ':Attribute harus berisi antara :min sampai :max karakter.',
    ],
    'boolean'              => ':Attribute harus bernilai true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'current_password'     => 'Kata sandi salah.',
    'date'                 => ':Attribute bukan tanggal yang valid.',
    'date_equals'          => ':Attribute harus berisi tanggal yang sama dengan :date.',
    'date_format'          => ':Attribute tidak cocok dengan format :format.',
    'declined'             => ':Attribute ini harus ditolak.',
    'declined_if'          => ':Attribute ini harus ditolak ketika :other bernilai :value.',
    'different'            => ':Attribute dan :other harus berbeda.',
    'digits'               => ':Attribute harus terdiri dari :digits angka.',
    'digits_between'       => ':Attribute harus terdiri dari :min sampai :max angka.',
    'dimensions'           => ':Attribute tidak memiliki dimensi gambar yang valid.',
    'distinct'             => ':Attribute memiliki nilai yang duplikat.',
    'email'                => ':Attribute harus berupa alamat surel yang valid.',
    'ends_with'            => ':Attribute harus diakhiri salah satu dari berikut: :values',
    'enum'                 => ':Attribute yang dipilih tidak valid.',
    'exists'               => ':Attribute yang dipilih tidak valid.',
    'file'                 => ':Attribute harus berupa sebuah berkas.',
    'filled'               => ':Attribute harus memiliki nilai.',
    'gt'                   => [
        'array'   => ':Attribute harus memiliki lebih dari :value anggota.',
        'file'    => ':Attribute harus berukuran lebih besar dari :value kilobita.',
        'numeric' => ':Attribute harus bernilai lebih besar dari :value.',
        'string'  => ':Attribute harus berisi lebih besar dari :value karakter.',
    ],
    'gte'                  => [
        'array'   => ':Attribute harus terdiri dari :value anggota atau lebih.',
        'file'    => ':Attribute harus berukuran lebih besar dari atau sama dengan :value kilobita.',
        'numeric' => ':Attribute harus bernilai lebih besar dari atau sama dengan :value.',
        'string'  => ':Attribute harus berisi lebih besar dari atau sama dengan :value karakter.',
    ],
    'image'                => ':Attribute harus berupa gambar.',
    'in'                   => ':Attribute yang dipilih tidak valid.',
    'in_array'             => ':Attribute tidak ada di dalam :other.',
    'integer'              => ':Attribute harus berupa bilangan bulat.',
    'ip'                   => ':Attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => ':Attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => ':Attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => ':Attribute harus berupa JSON string yang valid.',
    'lt'                   => [
        'array'   => ':Attribute harus memiliki kurang dari :value anggota.',
        'file'    => ':Attribute harus berukuran kurang dari :value kilobita.',
        'numeric' => ':Attribute harus bernilai kurang dari :value.',
        'string'  => ':Attribute harus berisi kurang dari :value karakter.',
    ],
    'lte'                  => [
        'array'   => ':Attribute harus tidak lebih dari :value anggota.',
        'file'    => ':Attribute harus berukuran kurang dari atau sama dengan :value kilobita.',
        'numeric' => ':Attribute harus bernilai kurang dari atau sama dengan :value.',
        'string'  => ':Attribute harus berisi kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address'          => ':Attribute harus berupa alamat MAC yang valid.',
    'max'                  => [
        'array'   => ':Attribute maksimal terdiri dari :max anggota.',
        'file'    => ':Attribute maksimal berukuran :max kilobita.',
        'numeric' => ':Attribute maksimal bernilai :max.',
        'string'  => ':Attribute maksimal berisi :max karakter.',
    ],
    'mimes'                => ':Attribute harus berupa berkas berjenis: :values.',
    'mimetypes'            => ':Attribute harus berupa berkas berjenis: :values.',
    'min'                  => [
        'array'   => ':Attribute minimal terdiri dari :min anggota.',
        'file'    => ':Attribute minimal berukuran :min kilobita.',
        'numeric' => ':Attribute minimal bernilai :min.',
        'string'  => ':Attribute minimal berisi :min karakter.',
    ],
    'multiple_of'          => ':Attribute harus merupakan kelipatan dari :value',
    'not_in'               => ':Attribute yang dipilih tidak valid.',
    'not_regex'            => 'Format :attribute tidak valid.',
    'numeric'              => ':Attribute harus berupa angka.',
    'password'             => 'Kata sandi salah.',
    'password' => [
        'letters' => ':Attribute harus mengandung setidaknya satu huruf.',
        'mixed' => ':Attribute harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
        'numbers' => ':Attribute harus mengandung setidaknya satu nomor.',
        'symbols' => ':Attribute harus mengandung setidaknya satu simbol.',
        'uncompromised' => 'Pemberian :attribute telah muncul dalam kebocoran data. Silakan pilih yang berbeda :attribute.',
    ],
    'present'              => ':Attribute wajib ada.',
    'prohibited'           => ':Attribute tidak boleh ada.',
    'prohibited_if'        => ':Attribute tidak boleh ada bila :other adalah :value.',
    'prohibited_unless'    => ':Attribute tidak boleh ada kecuali :other memiliki nilai :values.',
    'prohibits'            => ':Attribute melarang isian :other untuk ditampilkan.',
    'regex'                => 'Format :attribute tidak valid.',
    'required'             => ':Attribute wajib diisi.',
    'required_array_keys'  => ':Attribute wajib berisi entri untuk: :values.',
    'required_if'          => ':Attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => ':Attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => ':Attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => ':Attribute wajib diisi bila terdapat :values.',
    'required_without'     => ':Attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => ':Attribute wajib diisi bila sama sekali tidak terdapat :values.',
    'same'                 => ':Attribute dan :other harus sama.',
    'size'                 => [
        'array'   => ':Attribute harus mengandung :size anggota.',
        'file'    => ':Attribute harus berukuran :size kilobyte.',
        'numeric' => ':Attribute harus berukuran :size.',
        'string'  => ':Attribute harus berukuran :size karakter.',
    ],
    'starts_with'          => ':Attribute harus diawali salah satu dari berikut: :values',
    'string'               => ':Attribute harus berupa string.',
    'timezone'             => ':Attribute harus berisi zona waktu yang valid.',
    'unique'               => ':Attribute sudah ada sebelumnya.',
    'uploaded'             => ':Attribute gagal diunggah.',
    'url'                  => 'Format :attribute tidak valid.',
    'uuid'                 => ':Attribute harus merupakan UUID yang valid.',
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        'username' => 'Nama Pengguna',
        'first_name' => 'Nama Depan',
        'last_name' => 'Nama Belakang',
        'full_name' => 'Nama Lengkap',
        'phone' => 'Telepon',
        'password_old' => 'Kata sandi lama',
        'password_new' => 'Kata sandi baru',
        'password_new_confirmation' => 'Konfirmasi kata sandi baru',

        'wedding_id' => 'Undangan',
        'file' => 'File',
        'name' => 'Nama',
        'status' => 'Status',
        'package_id' => 'Paket',
        'wedding_url' => 'Link undangan',

        // groom-bride start
        'groom_name' => 'Nama lengkap pengantin pria',
        'groom_nickname' => 'Nama panggilan pengantin pria',
        'groom_mother_name' => 'Nama ibu pengantin pria',
        'groom_father_name' => 'Nama ayah pengantin pria',
        'groom_ig' => 'Instagram pengantin pria',

        'bride_name' => 'Nama lengkap pengantin wanita',
        'bride_nickname' => 'Nama panggilan pengantin wanita',
        'bride_mother_name' => 'Nama ibu pengantin wanita',
        'bride_father_name' => 'Nama ayah pengantin wanita',
        'bride_ig' => 'Instagram pengantin wanita',

        'groom_image_file' => 'Foto pengantin pria',
        'bride_image_file' => 'Foto pengantin wanita',
        // groom-bride end

        // event start
        'wedding_covenant_name' => 'Nama acara pertama',
        'start_wedding_covenant_time' => 'Waktu mulai acara pertama',
        'end_wedding_covenant_time' => 'Waktu selesai acara pertama',
        'wedding_covenant_address' => 'Alamat acara pertama',
        'wedding_map_covenant_link' => 'Lokasi acara pertama',

        'wedding_reception_name' => 'Nama acara kedua',
        'start_wedding_reception_time' => 'Waktu mulai acara kedua',
        'end_wedding_reception_time' => 'Waktu selesai acara kedua',
        'wedding_reception_address' => 'Alamat acara kedua',
        'wedding_map_reception_link' => 'Lokasi acara kedua',
        // event end

        // letter start
        'greeting_id' => 'Salam pembuka',
        'invitation_letter' => 'Salam undangan',
        // letter end

        // backsound start
        'backsound_custom_file' => 'File kustom musik latar',
        'backsound_id' => 'Musk latar',
        // backsound end

        // digital-money start
        'bank_account_id_1' => 'Akun bank pertama',
        'bank_account_bank_id_1' => 'Bank pertama',
        'bank_account_number_1' => 'Nomor rekening',
        'bank_account_name_1' => 'Nama pemilik rekening',
        'bank_account_status_1' => 'Status bank pertama',

        'ewallet_account_id_1' => 'Akun ewallet pertama',
        'ewallet_account_ewallet_id_1' => 'Ewallet pertama',
        'ewallet_account_image_file_1' => 'QR code pertama',
        'ewallet_account_name_1' => 'Nama pemilik ewallet',
        'ewallet_account_status_1' => 'Status ewallet pertama',
        // digital-money end

        // pre-wedding-images start
        'image_file_1' => 'Foto 1',
        'image_file_2' => 'Foto 2',
        'image_file_3' => 'Foto 3',
        'image_file_4' => 'Foto 4',
        'image_file_5' => 'Foto 5',
        'image_file_6' => 'Foto 6',
        // pre-wedding-images end

        'paid' => 'Penarikan',
        'to_first_name' => 'Nama depan',
        'to_last_name' => 'Nama belakang',
        'to_phone' => 'Phone',
        'to_email' => 'Email',
        'to_payment_type' => 'Metode pembayaran',
        'to_payment_name' => 'Nama akun',
        'to_payment_number' => 'Nomor akun',

        // fileManagers
        'code' => 'Kode',
        'path' => 'Lokasi',

        // menus
        'title'           => 'Judul',
        'permission_name' => 'Izin',
        'order'           => 'Urutan',

        // articles
        'en' => [
            'title' => 'Tiele'
        ],
    ],
];
