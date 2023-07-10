package com.example.linkiechatapp

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Patterns
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import com.google.firebase.auth.FirebaseAuth


class ForgotPassActivity : AppCompatActivity() {
    private lateinit var firebaseAuth:FirebaseAuth
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_forgot_pass)
        firebaseAuth = FirebaseAuth.getInstance()
        supportActionBar?.hide()

        val btnReset = findViewById<Button>(R.id.btnReset)
        val forPassEmail = findViewById<EditText>(R.id.edt_email_fp)

        btnReset.setOnClickListener {
            val email = forPassEmail.text.toString().trim()



            if (email.isNotEmpty()) {
                if (Patterns.EMAIL_ADDRESS.matcher(email).matches()) {
                    firebaseAuth.sendPasswordResetEmail(email).addOnCompleteListener {
                        if (it.isSuccessful) {
                            startActivity(
                                Intent(
                                    this@ForgotPassActivity,
                                    Login::class.java
                                )
                            )
                            Toast.makeText(
                                this@ForgotPassActivity,
                                "Please check your e-mail",
                                Toast.LENGTH_SHORT
                            )
                        } else {
                            Toast.makeText(
                                this@ForgotPassActivity,
                                "An error occurred! Please try again",
                                Toast.LENGTH_SHORT
                            )
                        }
                    }
                } else {
                    forPassEmail.setError("Invalid E-mail address")
                    forPassEmail.requestFocus()
                }
            } else {
                forPassEmail.setError("E-mail is required")
                forPassEmail.requestFocus()
            }
        }
    }
}