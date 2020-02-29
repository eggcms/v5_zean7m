<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Analyze;
use App\Lotto;
class FrontController extends Controller
{
    public function index() {

		$news = DB::table('blogs')->orderBy('id','desc')->take(5)->get();
		$analyzes = Analyze::orderBy('id','desc')->take(6)->get();

		$json = file_get_contents('https://zeanza.com/mm88fa-api/vision_data/api.php?met=hdp&APIkey=S09ZWFArak1BZTNpcUZGNTA2YWVia2tjU0F0bUVyazNZdjJVSGpZWXJMcDlrWHFYRGNnYlRjTWphaFg1RUVVWGh6WjNsUDZ6WUJKeDlCYUFRZzdrenc9PTo6G5mkISD1Nfndtt7QHBsBSA==');
		$objs = json_decode($json);
		$youtube = DB::table('youtubes')->orderBy('id','desc')->take(2)->get();
		$tsteps = DB::table('tsteps')->orderBy('id','asc')->where('updated_at','>',date("Y-m-d 06:00:00"))->take(8)->get();

		$max_tstep=$tsteps->count();
        $dataxSet = [];
        $im=0;
        if ($max_tstep > 0) {
			$im++;
			foreach($tstepsx as $ttsx) {
				$av = User::where('id',$ttsx->uid)->first();
				if ($ttsx->team1w == 0) { $ttsx->team1w='black'; }
				elseif ($ttsx->team1w == 1) { $ttsx->team1w='red'; }
				elseif ($ttsx->team1w == 2) { $ttsx->team1w='#00CC00'; }
				if ($ttsx->team2w == 0) { $ttsx->team2w='black'; }
				elseif ($ttsx->team2w == 1) { $ttsx->team2w='red'; }
				elseif ($ttsx->team2w == 2) { $ttsx->team2w='#00CC00'; }
				if ($ttsx->team3w == 0) { $ttsx->team3w='black'; }
				elseif ($ttsx->team3w == 1) { $ttsx->team3w='red'; }
				elseif ($ttsx->team3w == 2) { $ttsx->team3w='#00CC00'; }
				$dataxSet[] = [
					"id"=> $ttsx->id,
					"uid"=> $ttsx->uid,
					"team1"=> $ttsx->team1,
					"team2"=> $ttsx->team2,
					"team3"=> $ttsx->team3,
					"team1w"=> $ttsx->team1w,
					"team2w"=> $ttsx->team2w,
					"team3w"=> $ttsx->team3w,
					"created_at"=> $ttsx->created_at,
                    "updated_at"=> $ttsx->updated_at,
					"img"=> $im,
					"facebook"=> $av->facebook,
					"userline"=> $av->line
				];
			}
			$mm = (8 - $max_tstep);
			for($i=1;$i<=$mm;$i++){
				$imi=$im+$i;
				$dataxSet[] = ["id"=> '',"uid"=> '',"team1"=> '',"team2"=> '',"team3"=> '',"team1w"=> '',"team2w"=> '',"team3w"=> '',"created_at"=> '',"updated_at"=> '',"img"=>$imi,"line"=>''];
			}
		}
		else {
			for($i=1;$i<=8;$i++){
				$imi=$im+$i;
				$dataxSet[] = ["id"=> '',"uid"=> '',"team1"=> '',"team2"=> '',"team3"=> '',"team1w"=> '',"team2w"=> '',"team3w"=> '',"created_at"=> '',"updated_at"=> '',"img"=>$imi,"line"=>''];
			}
		}

		return view('page.home',[
			'meta_title'=>'เซียน7m ศูนย์รวมทีเด็ดบอลสเต็ป โดยบรรดากูรู ระดับเซียนในวงการลูกหนัง',
			'meta_description'=>'เซียน7m ศูนย์รวมทีเด็ดบอลสเต็ป ข้อมูลบอลจากลีกดังทั่วโลก โดยมุ่งเน้นข้อมูลที่ถูกต้อง ฉับไวเที่ยงตรง โดยบรรดากูรู ระดับเซียนในวงการลูกหนัง',
			'news'=>$news,
			'analyzes'=>$analyzes,
			'objs'=>$objs,
            'youtube'=>$youtube,
            'tsteps'=>$dataxSet,
            'tstep_count'=>$max_tstep,
		]);
	}
	
	public function allnews() {
		$news = DB::table('blogs')->orderBy('id','desc')->get();
		
        return view('page.allnews',[
		 	'meta_title'=>'เซียน7เอ็มดอทคอม ศูนย์รวมข่าวสารวงการบอล จากลีกดังทั่วโลก',
		 	'meta_description'=>'เซียน7เอ็มดอทคอม ศูนย์รวมข่าวสารวงการบอล จากลีกดังทั่วโลก เที่ยงตรง กระชับ ฉับไว',
		 	'allnews'=>$news
		]);
	}
	
    public function allvicrow() {
        $analyzes = DB::table('analyzes')->orderBy('id','desc')->get();
        return view('page.allvicrow',[
			'meta_title'=>'เซียน7เอ็มดอทคอม วิเคราะห์บอลเด็ด จากลีกดังต่างๆ ทั่วโลก',
			'meta_description'=>'เซียน7เอ็มดอทคอม วิเคราะห์ทีมบอล แบบเที่ยงตรง ข้อมูลแน่นๆ ฟันธงแบบเป๊ะๆ โดยกูรูขั้นเทพในวงการ',
			'analyzes'=>$analyzes
		]);
	}
	
    public function news($id) {
		visit($id);
        $news = DB::table('blogs')->where('id',$id)->first();
		$news_update = DB::table('blogs')->orderBy('id','desc')->where('id','!=',$news->id)->take(5)->get();
        return view('page.news',[
		 	'news'=>$news
		],[
		 	'news_update'=>$news_update
		]);
	}

	public function vicrow($id) {
		visit($id,'none','analyze');
        $vicrow = DB::table('analyzes')->where('id',$id)->first();
		$vicrow_update = DB::table('analyzes')->orderBy('id','desc')->where('id','!=',$vicrow->id)->take(5)->get();
        return view('page.vicrow',[
		 	'vicrow'=>$vicrow
		],[
		 	'vicrow_update'=>$vicrow_update
		]);
	}

	public function lineNotify(Request $request) {
        $message='Name: '.$request->fullname.' Mobile: '.$request->phone.'LineID: '.$request->lineid;
		// tdedclub token: E85WI8wJ3xDUBlxLR0xGl9zOeep3TseAQMmyKA4kJw0
		// zean7m token: NB8seJUF9qkjQ2wR5Dk4tZx19kRbcVLjRYX4QQgxDxA
        $token = 'NB8seJUF9qkjQ2wR5Dk4tZx19kRbcVLjRYX4QQgxDxA';
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, "message=$message");
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array( "Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token", );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec( $ch );
        curl_close( $ch );
        return Redirect()->back();
	}

	public function tdstep() {
		$json = file_get_contents('https://zeanza.com/mm88fa-api/vision_data/api.php?met=hdp&APIkey=S09ZWFArak1BZTNpcUZGNTA2YWVia2tjU0F0bUVyazNZdjJVSGpZWXJMcDlrWHFYRGNnYlRjTWphaFg1RUVVWGh6WjNsUDZ6WUJKeDlCYUFRZzdrenc9PTo6G5mkISD1Nfndtt7QHBsBSA==');
		$objs = json_decode($json);
		$youtube = DB::table('youtubes')->orderBy('id','desc')->take(2)->get();
		return view('page.tdstep',[
			'meta_title'=>'เซียน7เอ็มดอทคอม ราคาบอลสเต็ปเดี่ยว',
			'meta_description'=>'เซียน7เอ็มดอทคอม ราคาบอลสเต็ปเดี่ยว ประจำวันนี้',
			'objs'=>$objs,
			'youtube'=>$youtube
		]);
	}

	public function tdstep2() {
        $json = file_get_contents('https://zeanza.com/mm88fa-api/vision_data/api.php?met=hdp&APIkey=S09ZWFArak1BZTNpcUZGNTA2YWVia2tjU0F0bUVyazNZdjJVSGpZWXJMcDlrWHFYRGNnYlRjTWphaFg1RUVVWGh6WjNsUDZ6WUJKeDlCYUFRZzdrenc9PTo6G5mkISD1Nfndtt7QHBsBSA==');
		$objs = json_decode($json);
    	$youtube = DB::table('youtubes')->orderBy('id','desc')->take(2)->get();
		return view('page.tdstep2',[
	 		'meta_title'=>'เซียน7เอ็มดอทคอม ราคาบอลสเต็ป',
	 		'meta_description'=>'เซียน7เอ็มดอทคอม ราคาบอลสเต็ป ประจำวันนี้',
			'objs'=>$objs,
			'youtube'=>$youtube
		]);
	}

    public function liveball() {
		//$embed = ball_table();
        return view('page.live',[
			'meta_title'=>'เซียน7เอ็มดอทคอม ดูบอลบสด ศูนย์รวมข่าวสารวงการบอล จากลีกดังทั่วโลก',
			'meta_description'=>'เซียน7เอ็มดอทคอม ดูบอลบสด ศูนย์รวมข่าวสารวงการบอล จากลีกดังทั่วโลก เที่ยงตรง กระชับ ฉับไว',
		]);			
	}	

	public function check_lotto(Request $request) {
		$myLotto=$request->input('ur_lotto');
		$lotto=Lotto::orderBy('lotto_at','desc')->first();
		$result=check_lotto($myLotto,$lotto);

		$lotto_at=explode('-',$lotto->lotto_at);
		$month = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$at =(int) $lotto_at[1];
		$lotto_at=$lotto_at[0].' '.$month[$at].' '.ceil($lotto_at[2]+543);
		return view('page.lotto',[
			'lotto'=>$lotto,
			'lotto1closeup'=>$lotto->lotto1,
			'lotto2'=>explode(' ',$lotto->lotto2),
			'lotto3'=>explode(' ',$lotto->lotto3),
			'lotto4'=>explode(' ',$lotto->lotto4),
			'lotto5'=>explode(' ',$lotto->lotto5),
			'lotto_front3'=>explode(' ',$lotto->lotto_front3),
			'lotto_last3'=>explode(' ',$lotto->lotto_last3),
			'lotto_last2'=>$lotto->lotto_last2,
			'lotto_at'=>$lotto_at,
			'reason'=>$result['reason'],
			'mylotto'=>$result['mylotto'],
		]);	
	}
	public function lotto() {
		$lotto=Lotto::orderBy('lotto_at','desc')->first();
		$lotto_at=explode('-',$lotto->lotto_at);
		$month = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$at =(int) $lotto_at[1];
		$lotto_at=$lotto_at[0].' '.$month[$at].' '.ceil($lotto_at[2]+543);
		return view('page.lotto',[
			'lotto'=>$lotto,
			'lotto1closeup'=>$lotto->lotto1,
			'lotto2'=>explode(' ',$lotto->lotto2),
			'lotto3'=>explode(' ',$lotto->lotto3),
			'lotto4'=>explode(' ',$lotto->lotto4),
			'lotto5'=>explode(' ',$lotto->lotto5),
			'lotto_front3'=>explode(' ',$lotto->lotto_front3),
			'lotto_last3'=>explode(' ',$lotto->lotto_last3),
			'lotto_last2'=>$lotto->lotto_last2,
			'lotto_at'=>$lotto_at,
			'reason'=>'none',
		]);		
	}
}
