<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'histories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
	protected $fillable = ['id','historydate','id_empresa','id_patient','id_appointment','antecedente','motivo','enfactual','tipolente','color',
	                'filtro','coloracion','usolente','od_esfera','od_cilindro','od_eje','od_prisma','od_base','od_av_cerca_cc','od_av_cerca_sc',
	                 'od_av_lejos_cc','od_av_lejos_sc','od_av_ph','oi_esfera','oi_cilindro','oi_eje','oi_prisma','oi_base','oi_av_cerca_cc',
	                'oi_av_cerca_sc','oi_av_lejos_cc','oi_av_lejos_sc','oi_av_ph','ho_forico_cerca_cc','ho_forico_cerca_sc','ho_forico_lejos_cc',
	                'ho_forico_lejos_sc','ve_forico_cerca_cc','ve_forico_cerca_sc','ve_forico_lejos_cc','ve_forico_lejos_sc','od_ang_kappa',
	                'oi_ang_kappa','ojo_dominante','mano_dominante','ppc_or','ppc_sf','od_fijacion','oi_fijacion','ctest_lejos','ctest_cerca',
	                'dist_interpupilar','pupila','observacion','causa','diagnostico1','diagnostico2','diagnostico3','diagnostico4','complicacion',
	                'finalidad','luz_worth','distancia','ojo_suprime','bagolini','post_img','ang_anomalia','cs_cerca','cs_lejos','test','rfnv_vl',
					'rfp_vl','aa_od','nivel_visual_od','tecnica','flexibilidad_od','rfn_vp','rfp_vp','aa_oi','nivel_visual_oi','flexibilidad_oi','od_meridiano1',
					'od_meridiano2','od_eje_oftal','od_obser_oftal','oi_meridiano1','oi_meridiano2','oi_eje_oftal','oi_obser_oftal','od_esfera_retino','od_cilindro_retino','od_eje_retino',
					'od_prisma_retino','od_base_retino','od_add_retino','od_avcc_vl_retino','od_avcc_vp_retino','oi_esfera_retino','oi_cilindro_retino','oi_eje_retino','oi_prisma_retino',
					'oi_base_retino','oi_add_retino','oi_avcc_vl_retino','oi_avcc_vp_retino','comp_retino','obser_retino','amb_organic','amb_functional','fixation','treatment','affected_eye',
					'pupils','respond_to','pupil_exam','visual_acuity','intpup_dist','pupil_size_left','pupil_size_right','spher_equiv_left','spher_equiv_right','cylinder_left',
					'cylinder_right','id_medico','id_centromedico','state','created_user','updated_user'
	];	
}
