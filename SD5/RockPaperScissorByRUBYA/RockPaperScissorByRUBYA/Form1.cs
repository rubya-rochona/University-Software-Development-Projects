using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace RockPaperScissorByRUBYA
{
    public partial class Form1 : Form
    {

        int rounds = 3;
        int timerPerformed = 6;
        bool gameOver = false;

        string[] CPUchoiceList = { "rock", "paper", "scissor", "paper", "scissor", "rock" };

        int randomNumber = 0;

        Random rnd = new Random();

        string CPUChoice;

        string playerChoice;

        int playerScore;
        int CPUScore;

        public Form1()
        {
            InitializeComponent();

            countDownTimer.Enabled = true;

            playerChoice ="none";
            txtCountDown.Text = "5";
        }

        private void btnRock_Click(object sender, EventArgs e)
        {
            picPlayer.Image = Properties.Resources.rock;
            playerChoice = "rock";

        }

        private void btnPaper_Click(object sender, EventArgs e)
        {
            picPlayer.Image = Properties.Resources.paper;
            playerChoice = "paper";
        }

        private void btnScissor_Click(object sender, EventArgs e)
        {
            picPlayer.Image = Properties.Resources.scissor;
            playerChoice = "scissor";
        }

        private void btnRestart_Click(object sender, EventArgs e)
        {
            playerScore = 0;
            CPUScore = 0;
            rounds = 3;

            txtScore.Text = "Player: " + playerScore + " - " + "CPU: " + CPUScore;

            playerChoice = "none";

            countDownTimer.Enabled = true;

            picPlayer.Image = Properties.Resources.questionmark;
            picCPU.Image = Properties.Resources.questionmark;

            gameOver = false;

        }

        private void countDownTimerEvent(object sender, EventArgs e)
        {
            timerPerformed -= 1;

            txtCountDown.Text = timerPerformed.ToString();

            txtRounds.Text = "Rounds: " + rounds;

            if(timerPerformed < 1)
            {
                countDownTimer.Enabled = false;

                timerPerformed = 6;

                randomNumber = rnd.Next(0, CPUchoiceList.Length);

                CPUChoice = CPUchoiceList[randomNumber];

                switch(CPUChoice)
                {
                    case "rock":
                        picCPU.Image = Properties.Resources.rock;
                        break;

                    case "paper":
                        picCPU.Image = Properties.Resources.paper;
                        break;

                    case "scissor":
                        picCPU.Image = Properties.Resources.scissor;
                        break;
                }

                if (rounds > 0)
                {
                    checkGame();
                }

                else
                {
                    if(playerScore > CPUScore)
                    {
                        MessageBox.Show("Player Won the Game !");
                    }

                    else
                    {
                        MessageBox.Show("CPU Won the Game !");
                    }

                    gameOver = true;
                }
            }


        }

        public void checkGame()
        {
            if (playerChoice == "rock" && CPUChoice == "paper")
            {
                CPUScore += 1;
                rounds -= 1;

                MessageBox.Show("CPU Won!");
            }

            else if (playerChoice == "scissor" && CPUChoice == "rock")
            {
                CPUScore += 1;
                rounds -= 1;

                MessageBox.Show("CPU Won!");
            }

            else if (playerChoice == "paper" && CPUChoice == "scissor")
            {
                CPUScore += 1;
                rounds -= 1;

                MessageBox.Show("CPU Won!");
            }

            else if (playerChoice == "rock" && CPUChoice == "scissor")
            {
                playerScore += 1;
                rounds -= 1;

                MessageBox.Show("Player Won!");
            }

            else if (playerChoice == "paper" && CPUChoice == "rock")
            {
                playerScore += 1;
                rounds -= 1;

                MessageBox.Show("Player Won!");
            }

            else if (playerChoice == "scissor" && CPUChoice == "paper")
            {
                playerScore += 1;
                rounds -= 1;

                MessageBox.Show("Player Won!");
            }

            else if (playerChoice == "none")
            {
                MessageBox.Show("Make a Choice !");
            }

            else
            {
                MessageBox.Show("It's a Draw !");
            }

            startNextRound();
        }

        private void startNextRound()
        {
            if(gameOver == true)
            {
                return;
            }

            // Update Score
            txtScore.Text = "Player: " + playerScore + " - " + "CPU: " + CPUScore;

            playerChoice = "none";

            countDownTimer.Enabled = true;

            picPlayer.Image = Properties.Resources.questionmark;
            picCPU.Image = Properties.Resources.questionmark;
        }
    }
}