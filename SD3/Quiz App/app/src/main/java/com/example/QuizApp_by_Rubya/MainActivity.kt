package com.example.QuizApp_by_Rubya

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Button
import android.widget.CheckBox
import android.widget.TextView

class MainActivity : AppCompatActivity() {
    private lateinit var button: Button
    private lateinit var text1: TextView
    private lateinit var text2: TextView
    private lateinit var option1: CheckBox
    private lateinit var option2: CheckBox
    private lateinit var option3: CheckBox
    private val correct: String = "Correct Answer"
    private val wrong: String = "Wrong Answer"
    private val oneOption: String = "Select one option"
    private val noOption: String = "No option is selected!"
    private var count: Int = 0
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        button = findViewById(R.id.button)
        button.setOnClickListener(listener)
        text1 = findViewById(R.id.result)
        text2 = findViewById(R.id.caution)
        option1 = findViewById(R.id.option1)
        option1.setOnClickListener(listener)
        option2 = findViewById(R.id.option2)
        option2.setOnClickListener(listener)
        option3 = findViewById(R.id.option3)
        option3.setOnClickListener(listener)
    }
    private val listener = View.OnClickListener { view ->
        when (view.id) {
            R.id.button ->
            {
                val x : String =
                    if (count > 1)
                        oneOption
                    else if (count == 0)
                        noOption
                    else if (option2.isChecked)
                        correct
                    else
                        wrong

                if(count == 1) {
                    text1.text = x
                    text2.text = null
                }
                else{
                    text1.text = null
                    text2.text = x
                }
            }
            R.id.option1 -> if(option1.isChecked) count++ else count--
            R.id.option2 -> if(option2.isChecked) count++ else count--
            R.id.option3 -> if(option3.isChecked) count++ else count--
        }
    }
}