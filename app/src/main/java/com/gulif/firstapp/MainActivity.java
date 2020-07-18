package com.gulif.firstapp;

import android.os.Bundle;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import android.view.View;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        FloatingActionButton fab = findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                TextView textValue = findViewById(R.id.text_value);
                String stringValue = textValue.getText().toString();
                int originalValue = Integer.parseInt(stringValue);
                int newValue = MyWorker.doubleTheValue(originalValue);
                textValue.setText(Integer.toString(newValue));

                Snackbar.make(view, "Changed value " + originalValue + " to " + newValue, Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
    }

}