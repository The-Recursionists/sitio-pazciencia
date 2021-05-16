<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 15, $variableNbWords = true),
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <em>Peccata paria.</em> Est autem etiam actio quaedam corporis, quae motus et status naturae congruentis tenet; Itaque hic ipse iam pridem est reiectus; <strong>Tuo vero id quidem, inquam, arbitratu.</strong></p><p>Atque ab his initiis profecti omnium virtutum et originem et progressionem persecuti sunt. Quis enim redargueret? Saepe ab Aristotele, a Theophrasto mirabiliter est laudata per se ipsa rerum scientia; Conferam tecum, quam cuique verso rem subicias; <a href="http://loripsum.net/" rel="noopener noreferrer" target="_blank">Quid ergo hoc loco intellegit honestum?</a> Quae diligentissime contra Aristonem dicuntur a Chryippo. Portenta haec esse dicit, neque ea ratione ullo modo posse vivi; Ergo opifex plus sibi proponet ad formarum quam civis excellens ad factorum pulchritudinem?</p><blockquote>Duo Reges: constructio interrete. <strong>Sint ista Graecorum;</strong> Atqui reperies, inquit, in hoc quidem pertinacem; Non dolere, inquam, istud quam vim habeat postea videro; <strong>Sed virtutem ipsam inchoavit, nihil amplius.</strong> <strong>Quae contraria sunt his, malane?</strong></blockquote><iframe class="ql-video" allowfullscreen="true" src="https://www.youtube.com/embed/e-5obm1G_FY?showinfo=0" frameborder="0"></iframe><p><br></p>',
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
