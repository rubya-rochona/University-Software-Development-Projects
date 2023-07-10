#ifndef MYHEADER_H_INCLUDED
#define MYHEADER_H_INCLUDED


int dx, dy;

int pic_rb_y =640;
int pic_gb_y=640;
int b;


void objectChange_1() {

	if(pic_gb_y < -100){
			pic_gb_y = 520;
		}
		else{
			pic_gb_y -=3;
		}

		

}

void objectChange_2(){

    if(pic_rb_y < -100){
			pic_rb_y = 520;
		}else{
			pic_rb_y -=5;
		}
}

#endif // !MYHEADER_H_INCLUDED