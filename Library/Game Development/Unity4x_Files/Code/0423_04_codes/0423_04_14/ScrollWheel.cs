// file: ScrollWheel.cs
using UnityEngine;
using System.Collections;

public class ScrollWheel : MonoBehaviour {
    public int margin;
    public bool allScreen = true;
    public float min = 0.0f;
    public float max = 10.0f;
    public float value = 10.0f;
    public float speed = 5;

    void OnGUI() {
        Rect rect = new Rect(margin, margin, 30, Screen.height - (margin * 2));
        value = GUI.VerticalScrollbar(rect, value, 1.0f, max, min);
        bool onArea;
        if (!allScreen && !rect.Contains(Input.mousePosition)) {
            onArea = false;
        }
        else {
            onArea = true;
        }
		
        float vsMove = Input.GetAxis("Mouse ScrollWheel") * speed;
        if ((value + vsMove) > min && onArea) {
            value += vsMove;
        }
    }
}    
