<?php

return [

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

    'accepted'          => ':attribute harus diterima.',
    'accepted_if'       => ':attribute harus diterima ketika :other adalah :value.',
    'active_url'        => ':attribute bukan URL yang sah.',
    'after'             => ':attribute harus berisi tanggal setelah :date.',
    'after_or_equal'    => ':attribute harus berisi tanggal setelah atau sama dengan :date.',
    'alpha'             => ':attribute hanya boleh berisi huruf.',
    'alpha_dash'        => ':attribute hanya boleh berisi huruf, angka, strip, dan garis bawah.',
    'alpha_num'         => ':attribute hanya boleh berisi huruf dan angka.',
    'array'             => ':attribute harus berisi sebuah array.',
    'before'            => ':attribute harus berisi tanggal sebelum :date.',
    'before_or_equal'   => ':attribute berisi tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus bernilai :min dan :max.',
        'file' => ':attribute harus berukuran :min dan :max kb.',
        'string' => ':attribute harus berisi :min dan :max karakter.',
        'array' => ':attribute harus memiliki :min dan :max anggota.',
    ],
    'boolean' => ':attribute harus bernilai true atau false.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'current_password' => 'Kata sandi tidak cocok.',
    'date' => ':attribute bukan tanggal yang sah.',
    'date_equals' => ':attribute harus berisi tanggal yang sama dengan :date.',
    'date_format' => ':attribute tidak cocok dengan format :format.',
    'declined' => ':attribute harus ditolak.',
    'declined_if' => ':attribute harus ditolak ketika :other adalah :value.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus terdiri dari :digits angka.',
    'digits_between' => ':attribute harus terdiri dari :min sampai :max angka.',
    'dimensions' => ':attribute tidak memiliki dimesi gambar yang sah.',
    'distinct' => ':attribute memiliki nilai yang duplikat.',
    'email' => ':attribute harus berisi alamat email yang sah.',
    'ends_with' => ':attribute harus diakhiri salah satu dari berikut: :values.',
    'enum' => ':attribute yang dipilih tidak sah.',
    'exists' => ':attribute yang dipilih tidak sah.',
    'file' => ':attribute harus berupa sebuah berkas.',
    'filled' => ':attribute harus memiliki nilai.',
    'gt' => [
        'numeric' => ':attribute harus bernilai lebih besar dari :value.',
        'file' => ':attribute harus berukuran lebih besar dari :value kb.',
        'string' => ':attribute harus berisi besar dari :value karakter.',
        'array' => ':attribute memiliki lebih besar dari :value anggota.',
    ],
    'gte' => [
        'numeric' => ':attribute harus bernilai lebih besar dari atau sama dengan :value.',
        'file' => ':attribute harus berukuran lebih besar dari atau sama dengan :value kb.',
        'string' => ':attribute harus berisi lebih besar dari atau sama dengan :value karakter.',
        'array' => ':attribute harus terdiri dari :value anggota atau lebih.',
    ],
    'image' => ':attribute harus berisi sebuah gambar.',
    'in' => ':attribute yang dipilih tidak sah.',
    'in_array' => ':attribute tidak ada di dalam :other.',
    'integer' => ':attribute harus berupa bilangan bulat.',
    'ip' => ':attribute harus berupa alamat IP yang sah.',
    'ipv4' => ':attribute harus berupa alamat IPv4 yang sah.',
    'ipv6' => ':attribute harus berupa alamat IPv6 yang sah.',
    'json' => ':attribute harus berupa string JSON yang valid.',
    'lt' => [
        'numeric' => ':attribute harus bernilai kurang dari :value.',
        'file' => ':attribute harus berukuran kurang dari :value kb.',
        'string' => ':attribute harus berisi kurang dari :value karakter.',
        'array' => ':attribute harus memiliki kurang dari :value anggota.',
    ],
    'lte' => [
        'numeric' => ':attribute harus bernilai kurang dari atau sama dengan :value.',
        'file' => ':attribute harus berukuran kurang dari atau sama dengan :value kb.',
        'string' => ':attribute harus berisi kurang dari atau sama dengan :value karakter.',
        'array' => ':attribute tidak boleh melebihi dari :value anggota.',
    ],
    'mac_address' => ':attribute harus berupa alamat MAC.',
    'max' => [
        'numeric' => ':attribute tidak boleh lebih dari :max.',
        'file' => ':attribute tidak boleh lebih dari :max kb.',
        'string' => ':attribute tidak boleh lebih dari :max karakter.',
        'array' => ':attribute tidak boleh lebih dari :max anggota.',
    ],
    'mimes' => ':attribute harus berupa berkas tipe: :values.',
    'mimetypes' => ':attribute harus berupa berkas tipe: :values.',
    'min' => [
        'numeric' => ':attribute tidak boleh kurang dari :min.',
        'file' => ':attribute tidak boleh kurang dari :min kb.',
        'string' => ':attribute tidak boleh kurang dari :min karakter.',
        'array' => ':attribute tidak boleh kurang dari :min anggota.',
    ],
    'multiple_of' => ':attribute harus kelipatan dari :value.',
    'not_in' => ':attribute yang dipilih tidak sah.',
    'not_regex' => 'Format :attribute tidak sah.',
    'numeric' => ':attribute harus berupa angka.',
    'password' => 'Kata sandi salah.',
    'present' => ':attribute harus ada.',
    'prohibited' => ':attribute dilarang diisi.',
    'prohibited_if' => ':attribute dilarang diisi jika :other adalah :value.',
    'prohibited_unless' => ':attribute dilarang diisi kecuali jika :other memiliki nilai :values.',
    'prohibits' => ':attribute dilarang diisi :other dari keberadaannya.',
    'regex' => ':attribute format tidak sah.',
    'required' => ':attribute harus diisi.',
    'required_array_keys' => ':attribute harus diisi salah satu dari: :values.',
    'required_if' => ':attribute harus diisi jika :other adalah :value.',
    'required_unless' => ':attribute harus diisi kecuali jika :other memiliki nilai :values.',
    'required_with' => ':attribute harus diisi jika :values tersedia.',
    'required_with_all' => ':attribute harus diisi jika :values tersedia.',
    'required_without' => ':attribute harus diisi jika :values tidak tersedia.',
    'required_without_all' => ':attribute harus diisi jika tidak ada dari :values yang tersedia.',
    'same' => ':attribute dan :other tidak cocok.',
    'size' => [
        'numeric' => ':attribute harus berukuran :size.',
        'file' => ':attribute harus berukuran :size kb.',
        'string' => ':attribute harus berukuran :size karakter.',
        'array' => ':attribute harus mengandung :size angota.',
    ],
    'starts_with' => ':attribute harus diawali salah satu dari berikut: :values.',
    'string' => ':attribute harus berupa string.',
    'timezone' => ':attribute harus berisi zona waktu yang sah.',
    'unique' => ':attribute sudah ada sebelumnya.',
    'uploaded' => ':attribute gagal diunggah.',
    'url' => ':attribute harus berupa URL yang sah.',
    'uuid' => ':attribute harus berupa UUID yang sah.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
