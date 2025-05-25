<?php
namespace App\Data;

class MajorClusters
{
    public static $traitWeights = [
        'analytical' => 1.5,
        'technical' => 1.5,
        'scientific' => 1.4,
        'innovative' => 1.3,
        'logical' => 1.3,
        'creative' => 1.3,
        'leadership' => 1.2,
        'social' => 1.2,
        'environmental' => 1.2,
        'economic' => 1.2,
        'strategic' => 1.1,
        'organized' => 1.1,
        'communicative' => 1.1,
        'detailOriented' => 1.0,
        'practical' => 1.0,
        'empathetic' => 1.0,
    ];

    public static $majorClusters = [
        'science_tech' => [
            'name' => 'Sains dan Teknologi',
            'description' => 'Kamu punya bakat dan minat yang kuat di bidang sains dan teknologi. Kemampuan analitismu, kecintaan pada eksperimen dan penemuan membuatmu cocok di jurusan-jurusan ini.',
            'traits' => ['analytical', 'logical', 'scientific'],
            'majors' => [
                [
                    'name' => 'Teknik Informatika',
                    'description' => 'Mempelajari ilmu komputer dan pengembangan perangkat lunak.',
                    'universities' => ['ITB', 'UI', 'ITS', 'BINUS', 'Telkom University'],
                    'careerProspects' => [
                        'Software Developer (Rp 8-25 juta/bulan)',
                        'Data Scientist (Rp 15-40 juta/bulan)',
                        'AI Engineer (Rp 15-45 juta/bulan)',
                        'DevOps Engineer (Rp 12-35 juta/bulan)',
                        'Tech Lead (Rp 25-60 juta/bulan)'
                    ],
                ],
                [
                    'name' => 'Data Science',
                    'description' => 'Mempelajari analisis dan interpretasi data kompleks untuk pengambilan keputusan.',
                    'universities' => ['UI', 'ITB', 'BINUS', 'UGM', 'ITS'],
                    'careerProspects' => [
                        'Data Analyst (Rp 7-20 juta/bulan)',
                        'Machine Learning Engineer (Rp 15-45 juta/bulan)',
                        'Business Intelligence Analyst (Rp 10-30 juta/bulan)',
                        'Research Scientist (Rp 15-40 juta/bulan)'
                    ],
                ],
                [
                    'name' => 'Artificial Intelligence',
                    'description' => 'Fokus pada pengembangan sistem kecerdasan buatan dan machine learning.',
                    'universities' => ['ITB', 'UI', 'ITS', 'BINUS', 'UGM'],
                    'careerProspects' => [
                        'AI Developer (Rp 15-45 juta/bulan)',
                        'Machine Learning Engineer (Rp 15-40 juta/bulan)',
                        'Computer Vision Engineer (Rp 12-35 juta/bulan)',
                        'NLP Engineer (Rp 12-35 juta/bulan)'
                    ],
                ],
            ],
        ],
        'creative_digital' => [
            'name' => 'Industri Kreatif Digital',
            'description' => 'Kamu memiliki kombinasi unik antara kreativitas dan pemahaman teknologi. Jurusan-jurusan ini memungkinkanmu mengekspresikan kreativitas melalui media digital.',
            'traits' => ['creative', 'artistic', 'innovative', 'technical'],
            'majors' => [
                [
                    'name' => 'Desain Komunikasi Visual',
                    'description' => 'Mempelajari desain visual untuk komunikasi efektif melalui berbagai media digital.',
                    'universities' => ['ITB', 'ITS', 'ISI Yogyakarta', 'BINUS', 'Telkom University'],
                    'careerProspects' => [
                        'UI/UX Designer (Rp 8-25 juta/bulan)',
                        'Motion Designer (Rp 7-20 juta/bulan)',
                        'Creative Director (Rp 15-40 juta/bulan)',
                        'Digital Artist (Rp 6-25 juta/bulan)'
                    ],
                ],
                [
                    'name' => 'Game Development',
                    'description' => 'Fokus pada pengembangan game dan interactive entertainment.',
                    'universities' => ['BINUS', 'ITB', 'ITS', 'Telkom University', 'UMN'],
                    'careerProspects' => [
                        'Game Developer (Rp 8-30 juta/bulan)',
                        'Game Designer (Rp 7-25 juta/bulan)',
                        'Technical Artist (Rp 8-28 juta/bulan)',
                        'Game Producer (Rp 15-45 juta/bulan)'
                    ],
                ],
            ],
        ],
        'business_digital' => [
            'name' => 'Bisnis Digital',
            'description' => 'Kamu memiliki pemahaman yang baik tentang teknologi dan bisnis. Jurusan ini mempersiapkanmu untuk era ekonomi digital.',
            'traits' => ['economic', 'strategic', 'innovative', 'analytical', 'leadership'],
            'majors' => [
                [
                    'name' => 'Digital Business',
                    'description' => 'Mempelajari transformasi digital dan model bisnis berbasis teknologi.',
                    'universities' => ['UI', 'ITB', 'BINUS', 'UGM', 'UNPAD'],
                    'careerProspects' => [
                        'Digital Marketing Manager (Rp 15-35 juta/bulan)',
                        'E-commerce Manager (Rp 12-30 juta/bulan)',
                        'Business Development (Rp 10-35 juta/bulan)',
                        'Digital Transformation Consultant (Rp 15-45 juta/bulan)'
                    ],
                ],
                [
                    'name' => 'Fintech',
                    'description' => 'Fokus pada teknologi finansial dan inovasi dalam sektor keuangan.',
                    'universities' => ['UI', 'ITB', 'BINUS', 'UGM', 'IPB'],
                    'careerProspects' => [
                        'Fintech Product Manager (Rp 15-40 juta/bulan)',
                        'Financial Analyst (Rp 8-25 juta/bulan)',
                        'Risk Management Specialist (Rp 10-30 juta/bulan)',
                        'Blockchain Developer (Rp 15-45 juta/bulan)'
                    ],
                ],
            ],
        ],
        'environmental_science' => [
            'name' => 'Ilmu Lingkungan dan Keberlanjutan',
            'description' => 'Kamu memiliki kepedulian terhadap lingkungan dan masa depan planet. Jurusan ini memungkinkanmu berkontribusi pada solusi masalah lingkungan.',
            'traits' => ['environmental', 'scientific', 'analytical', 'strategic', 'innovative'],
            'majors' => [
                [
                    'name' => 'Teknik Lingkungan',
                    'description' => 'Mempelajari solusi teknologi untuk masalah lingkungan dan keberlanjutan.',
                    'universities' => ['ITB', 'UI', 'ITS', 'UGM', 'UNDIP'],
                    'careerProspects' => [
                        'Environmental Engineer (Rp 8-25 juta/bulan)',
                        'Sustainability Consultant (Rp 10-35 juta/bulan)',
                        'Environmental Impact Analyst (Rp 8-30 juta/bulan)',
                        'Renewable Energy Specialist (Rp 12-40 juta/bulan)'
                    ],
                ],
                [
                    'name' => 'Sustainable Energy Engineering',
                    'description' => 'Fokus pada pengembangan dan implementasi energi terbarukan.',
                    'universities' => ['ITB', 'UI', 'ITS', 'UGM', 'UNDIP'],
                    'careerProspects' => [
                        'Renewable Energy Engineer (Rp 10-35 juta/bulan)',
                        'Energy Systems Analyst (Rp 8-30 juta/bulan)',
                        'Sustainability Manager (Rp 15-45 juta/bulan)',
                        'Clean Tech Consultant (Rp 12-40 juta/bulan)'
                    ],
                ],
            ],
        ],
    ];
}
