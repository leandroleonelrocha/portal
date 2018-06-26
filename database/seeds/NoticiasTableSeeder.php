<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('noticias')->insert([
            'titulo' => 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet.',
            'epigrafe' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
            'cuerpo' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.',
            'lecturas' => '151',
            'categoria_id' => '1',
            'tags' => 'informacion,actualidad'
        ]);

        DB::table('noticias')->insert([
            'titulo' => 'Lorem ipsum',
            'epigrafe' => 'Duis aute irure dolor in reprehenderit in voluptat...',
            'cuerpo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'lecturas' => '254',
            'categoria_id' => '1',
            'tags' => 'informacion,actualidad'
        ]);

        DB::table('noticias')->insert([
            'titulo' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem.',
            'epigrafe' => 'Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
            'cuerpo' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?',
            'lecturas' => '45',
            'categoria_id' => '1',
            'tags' => 'noticias'
        ]);

        DB::table('noticias')->insert([
            'titulo' => 'Titulo de la noticia',
            'epigrafe' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.',
            'cuerpo' => 'Cuerpo de la noticia

Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat Este texto está en negrita.',
            'lecturas' => '3',
            'categoria_id' => '1',
            'tags' => 'diferentes,tags,de la noticia'
        ]);

        DB::table('noticias')->insert([
            'titulo' => 'Terapia de noticias en LN+: ¿Se vienen las aerolíneas low cost en la Argentina?',
            'epigrafe' => 'El análisis de cómo afectaría al mercado la llegada de este modelo de negocio',
            'cuerpo' => 'Con la conducción del psicólogo Diego Sehinkman, el formato nocturno Terapia de Noticias en LN+ presenta los temas más destacados del día con el análisis de los mejores columnistas.
                        Diego Cabot explica en qué consiste y cómo funciona este modelo para poder ser rentable y competitivo.
                        La clave, según el periodista, es la utilización de aeropuertos secundarios, empleados multifuncionales y la limitación de los servicios ofrecidos.
                        En diálogo con Claudio Jacquelin, Gail Scriven, y Laura Serra, la mesa analiza cómo enfrentaría la aerolínea de bandera, Aerolíneas Argentinas, la entrada de un competidor de esta naturaleza.',
            'lecturas' => '6',
            'categoria_id' => '2',
            'tags' => 'aerolineas,bajo costo,low cost'
        ]);

        DB::table('noticias')->insert([
            'titulo' => 'El Gobierno comenzó a auditar con drones la construcción de viviendas sociales',
            'epigrafe' => 'La Secretaría de Vivienda le encargó a una empresa privada que fiscalice obras en varias provincias; detectaron pagos por trabajos que no se hicieron en la gestión de José López',
            'cuerpo' => 'La modernización del Estado, una de las banderas que levantó el presidente Mauricio Macri en la primera parte de su gestión, llegó al control de la obra pública, el sector que despertó las mayores polémicas en el último tiempo debido al manejo irregular que hizo de los recursos la gestión kirchnerista, que estuvo a cargo de José López, preso desde junio pasado tras intentar esconder bolsos con 9 millones de dólares en un convento.
                        La Secretaría de Vivienda, a cargo de Domingo Amaya, que hoy funciona en la órbita del Ministerio del Interior (la cartera que conduce Rogelio Frigerio), comenzó desde hace algunos meses a supervisar con drones el avance de la construcción de viviendas sociales en todo el país, según corroboró LA NACION con fuentes oficiales.
                        El servicio está tercerizado. Lo presta la compañía UAS View, que ya elaboró varios informes para la Secretaría de Vivienda. Cada documento cuenta con aproximadamente 22 páginas, aunque puede variar según el tamaño del proyecto auditado, que va acompañado de un video que muestra el trabajo del dron sobre las obras.
                        El 20 de junio pasado, por caso, se realizó el "Informe de seguimiento de obra pública con tecnologías VANT [vehículos aéreos no tripulados, como se conoce técnicamente a los drones]" sobre el Barrio La Perla, en Moreno, un partido del oeste del conurbano bonaerense.
                        El trabajo consta de cinco partes: la ficha de la obra, los antecedentes del relevamiento, el relevamiento hecho con el dron, un informe técnico, información complementaria y el registro del vuelo del aparato.
                        Las imágenes tomadas con el dispositivo muestran decenas de viviendas sin terminar. También hay fotos tomadas desde el nivel del suelo, que exhiben el deterioro de la construcción.
                        Según fuentes al tanto de la auditoría, que pidieron reserva de su nombre, eso se debe a que el kirchnerismo interrumpió la construcción de las viviendas antes de su finalización, por lo que quedaron expuestas a las inclemencias del clima y a eventuales hurtos.
                        El informe de la compañía sostiene, en el caso de La Perla, que "se observa un importante estado de abandono y vandalismo y/o hurto en más del 80 por ciento de las viviendas relevadas".
                        Eso fue favorecido porque el alambrado perimetral está incompleto y facilita el acceso desde el exterior, según constataron los auditores.
                        Además, asegura que, según las imágenes satelitales, en 2012 más del 70 por ciento ya tenían colocados techos y revestimientos internos, pero luego fueron hurtados. Entre 2014 y este año, en tanto, se registró "un avanzado grado de vandalismo". Por esa razón no se puede garantizar, según el informe, la integridad de las instalaciones de luz, agua y desagües, que están hechas en un 70 por ciento, algo que supondrá nuevos desembolsos para mejorar la infraestructura antes del estreno de las viviendas.
                        El informe también muestra que hay diferencias de cota (altura), por lo que recomienda la "consulta con [la] Dirección Provincial de Saneamiento y Obras Hidráulicas de la provincia de Buenos Aires y/o a la empresa constructora -para conocer tareas de nivelación de terreno y topografía actualizada-, con el objetivo de obtener información precisa y actualizada sobre la factibilidad de inundaciones en la zona y la dinámica de escurrimiento superficial, considerando al menos un radio de 500 metros del área de proyecto".
                        Según registros oficiales de la Secretaría de Vivienda, en Moreno se planificaron 1196 casas sociales que costaron $ 77 millones. Según el cronograma original, debían estar terminadas para diciembre de 2007, algo que estuvo lejos de ocurrir, si bien el Estado cumplió con el 100% de los pagos.
                        La actual gestión intentó reactivar el proyecto mediante un acuerdo con la Cooperativa de Trabajo 20 de Diciembre para terminar 36 viviendas.
                        El Gobierno acudió a la tecnología tras encontrar diversas irregularidades en la administración de los fondos para vivienda social, que van desde inconsistencias en el ingreso de los datos y la falta de un registro unificado hasta el desvío de fondos hacia otras actividades y el pago completo de obras con escaso grado de avance. Además del caso de Moreno, ya se hicieron auditorías con drones en las provincias de Tucumán y Chubut, entre otras.',
            'lecturas' => '4',
            'categoria_id' => '1',
            'tags' => 'drones,viviendas sociales,gobierno'
        ]);

        DB::table('noticias')->insert([
            'titulo' => 'Google and Facebook Take Aim at Fake News Sites',
            'epigrafe' => 'Over the last week, two of the world’s biggest internet companies have faced mounting criticism over how fake news on their sites may have influenced the presidential election’s outcome.',
            'cuerpo' => 'Over the last week, two of the world’s biggest internet companies have faced mounting criticism over how fake news on their sites may have influenced the presidential election’s outcome.
                        On Monday, those companies responded by making it clear that they would not tolerate such misinformation by taking pointed aim at fake news sites’ revenue sources.
                        Google kicked off the action on Monday afternoon when the Silicon Valley search giant said it would ban websites that peddle fake news from using its online advertising service. Hours later, Facebook, the social network, updated the language in its Facebook Audience Network policy, which already says it will not display ads in sites that show misleading or illegal content, to include fake news sites.
                        “We have updated the policy to explicitly clarify that this applies to fake news,” a Facebook spokesman said in a statement. “Our team will continue to closely vet all prospective publishers and monitor existing ones to ensure compliance.”
                        Taken together, the decisions were a clear signal that the tech behemoths could no longer ignore the growing outcry over their power in distributing information to the American electorate.
                        Facebook has been at the epicenter of that debate, accused by some commentators of swinging some voters in favor of President-elect Donald J. Trump through misleading and outright wrong stories that spread quickly via the social network. One such false story claimed that Pope Francis had endorsed Mr. Trump.
                        Google did not escape the glare, with critics saying the company gave too much prominence to false news stories. On Sunday, the site Mediaite reported that the top result on a Google search for “final election vote count 2016” was a link to a story on a website called 70News that wrongly stated that Mr. Trump, who won the Electoral College, was ahead of his Democratic challenger, Hillary Clinton, in the popular vote.
                        By Monday evening, the fake story had fallen to No. 2 in a search for those terms. Google says software algorithms that use hundreds of factors determine the ranking of news stories.
                        “The goal of search is to provide the most relevant and useful results for our users,” Andrea Faville, a Google spokeswoman, said in a statement. “In this case, we clearly didn’t get it right, but we are continually working to improve our algorithms.”
                        Facebook’s decision to clarify its ad policy language is notable because Mark Zuckerberg, the social network’s chief executive, has repeatedly fobbed off criticism that the company had an effect on how people voted. In a post on his Facebook page over the weekend, he said that 99 percent of what people see on the site is authentic, and only a tiny amount is fake news and hoaxes.
                        “Over all, this makes it extremely unlikely hoaxes changed the outcome of this election in one direction or the other,” Mr. Zuckerberg wrote.
                        Yet within Facebook, employees and executives have been increasingly questioning their responsibilities and role in influencing the electorate, The New York Times reported on Saturday.
                        Facebook’s ad policy update will not stem the flow of fake news stories that spread through the news feeds that people see when they visit the social network.
                        Facebook has long spoken of how it helped influence and stoke democratic movements in places like the Middle East, and it tells its advertisers that it can help sway its users with ads. Facebook reaches 1.8 billion people around the globe, and the company is one of the largest distributors of news online. A Pew Research Center study said that nearly half of American adults rely on Facebook as a news source.
                        Google’s decision on Monday relates to the Google AdSense system that independent web publishers use to display advertising on their sites, generating revenue when ads are seen or clicked on. The advertisers pay Google, and Google pays a portion of those proceeds to the publishers. More than two million publishers use Google’s advertising network.
                        For some time, Google has had policies in place prohibiting misleading advertisements from its system, including promotions for counterfeit goods and weight-loss scams. Google’s new policy, which it said would go into effect “imminently,” will extend its ban on misrepresentative content to the websites its advertisements run on.
                        “Moving forward, we will restrict ad serving on pages that misrepresent, misstate or conceal information about the publisher, the publisher’s content or the primary purpose of the web property,” Ms. Faville said.
                        Ms. Faville said that the policy change had been in the works for a while and was not in reaction to the election.
                        It remains to be seen how effective Google’s new policy on fake news will be in practice. The policy will rely on a combination of automated and human reviews to help determine what is fake. Although satire sites like The Onion are not the target of the policy, it is not clear whether some of them, which often run fake news stories written for humorous effect, will be inadvertently affected by Google’s change.',
            'lecturas' => ' 94',
            'categoria_id' => '1',
            'tags' => 'noticia,Carolina Stanley,actualidad'
        ]);

        DB::table('noticias')->insert([
            'titulo' => 'Fusce hendrerit tempor nunc, id accumsan neque eleifend',
            'epigrafe' => 'Integer elementum egestas nisl sed varius. Duis a mauris a dui maximus aliquet eu ut ipsum. Fusce hendrerit tempor nunc, id accumsan neque eleifend et',
            'cuerpo' => 'Nullam bibendum pulvinar lacus, eget malesuada tellus venenatis eu. Integer elementum egestas nisl sed varius. Duis a mauris a dui maximus aliquet eu ut ipsum. Fusce hendrerit tempor nunc, id accumsan neque eleifend et. Phasellus sagittis laoreet felis, accumsan pulvinar elit. Donec nec nisi vel elit porta vehicula vitae sit amet dolor. In at lorem et diam tempus viverra. Donec interdum metus nec vestibulum facilisis. Vivamus in sagittis lectus. Nam efficitur molestie tristique. Aliquam a turpis mauris. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla elementum non lectus eu ultrices. Suspendisse pretium lacus eget nisi tempus lacinia. Aliquam finibus tortor tortor, lobortis blandit lorem pretium sed.',
            'lecturas' => '70',
            'categoria_id' => '1',
            'tags' => ' noticias,actualidad,ministerio '
        ]);

        DB::table('noticias')->insert([
            'titulo' => '1914 translation by H. Rackham',
            'epigrafe' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human.',
            'cuerpo' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?',
            'lecturas' => '15',
            'categoria_id' => '2',
            'tags' => 'At,vero,eos,accusamus,iusto,odio'
        ]);

        /*DB::table('noticias')->insert([
            'titulo' => '',
            'epigrafe' => '',
            'cuerpo' => '',
            'lecturas' => '',
            'categoria_id' => '',
            'tags' => '',
            'fecha_publicacion' => '2016-11-04 00:00:01',
        ]);*/

    }
}
