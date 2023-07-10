#include "iGraphics.h"
#include <iostream>

int a=1;
int pic_x,pic_y;  // console
int green_ballon, red_ballon, target,boom_image,background;

int c_x,c_y;  //target

int pic_rb_y =640;
int pic_gb_y=640;


int score = 0;  // initial score
char score_char[10 + sizeof(char)];

int point = 10;

void iDraw()
{

	iClear();

    iShowImage(0,0, 640, 520, background);  

	if(a == 1){
		
		iShowImage(225, pic_gb_y, 120, 120, green_ballon); 
	}

	if(a == 2)
	{
		iShowImage(325, pic_rb_y, 120, 120, red_ballon);
	}


    if(a == 1)
	{
		iShowImage(325, pic_rb_y, 90, 90, boom_image);
		pic_rb_y = 520;
		
	}

	if(a == 2)
	{
        
		iShowImage(225, pic_gb_y, 90, 90, boom_image);

		pic_gb_y = 520;
		
	}
	
	iShowImage(c_x,c_y,100,100,target);	

	// for gameover
    if (pic_rb_y< -100 || pic_gb_y < -100)
        {
            iText(290,260,"Game Over");
            iPauseTimer(0);
        }
	
    
	iSetColor(0, 0, 0);  // RGB code for Black color
	iText(512, 503, "Score: ");

    std::sprintf(score_char, "%d", score);  // to print the score

    iText(565, 503, score_char);

	iText(10, 10, "Press P for pause, R for resume, END for exit.");
}


void iMouseMove(int mx, int my)
{

}

void iPassiveMouse(int mx, int my)   //movement of the target
{
	c_x = mx-50;
	c_y = my-50;
	
}


// scores
void iMouse(int button, int state, int mx, int my)
{
	if (button == GLUT_LEFT_BUTTON && state == GLUT_DOWN)
	{
			if(my >= pic_gb_y && my <= pic_gb_y+80)
			{
				a=2;
                score+= a*point;
               
			}
	
			if(my >= pic_rb_y && my <= pic_rb_y+80)
			{
				a=1;
                score+= a*point;
			}
	}
	

}


/// to pause and resume the game ///
void iKeyboard(unsigned char key)
{
	if (key == 'p')
	{
		iPauseTimer(0);
	}
	if (key == 'r')
	{
		iResumeTimer(0);
	}

}

/// to exit the game ///
void iSpecialKeyboard(unsigned char key)
{

	if (key == GLUT_KEY_END)
	{
		exit(0);
	}

}

/// to load the images ///
void load_image(){

    green_ballon = iLoadImage("images\\gb.png");
	red_ballon = iLoadImage("images\\rb.png");
	target = iLoadImage("images\\c.png");
	boom_image = iLoadImage("images\\boom.png");
    background = iLoadImage("images\\sky.jpg");

}

void objectChange() {

	if(pic_gb_y < -120){
			pic_gb_y = 520;
		}
		else{
			pic_gb_y -=5;   // speed
		}
		if(pic_rb_y < -120){
			pic_rb_y = 520;
		}else{
			pic_rb_y -=3;
		}
}


int main()
{

	iInitialize(640, 520, "Shoot The Ballons");
	// console
	pic_x =0;
	pic_y =640;
    load_image();

	iSetTimer(5,objectChange);
    

	iStart(); 

	return 0;
}