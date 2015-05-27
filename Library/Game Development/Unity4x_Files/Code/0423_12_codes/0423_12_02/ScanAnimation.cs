using UnityEngine;
using System.Collections;

public class ScanAnimation : MonoBehaviour
{
    public AnimationClip defaultClip;
    private float barValue;
    private float speed = 1.0f;
    private string buttonLabel = "PLAY";
    private bool isPlaying = false;
	private AnimationState state;

    void Start(){
        state = animation[defaultClip.name];
		state.wrapMode = WrapMode.Loop;
        state.speed = 0;
    }

    void OnGUI(){
        GUI.Label(new Rect(10, 10, 120, 20), "Animation Frame:");
        GUI.TextField(new Rect(120, 10, 40, 20), Mathf.FloorToInt(state.clip.frameRate * state.time).ToString(), 25);
        Rect sb = new Rect(10, 40, 300, 30);
		Rect lb = new Rect(10, 70, 120, 20);
		Rect tf = new Rect(120, 70, 40, 20);
		Rect hs = new Rect(10, 100, 300, 30);
		Rect bt = new Rect(10, 140, 70, 30);
		barValue = GUI.HorizontalScrollbar(sb, barValue, 0.0f, 0.0f, state.clip.frameRate * state.length);
        GUI.Label(lb, "Playback Speed:");
        GUI.TextField(tf, speed.ToString(), 25);
        speed = GUI.HorizontalScrollbar(hs, speed, 0.0f, 0.0f, 1.0f);
        if (GUI.Button(bt, buttonLabel)){
            if (isPlaying){
                isPlaying = false;
                buttonLabel = "PLAY";
                state.speed = 0;
            }else{
                isPlaying = true;
                buttonLabel = "PAUSE";
                state.speed = speed;
            }
		}
    }

    void Update(){
        if (!isPlaying){
            state.time = barValue / state.clip.frameRate;
            state.speed = 0;
        }else{
            barValue = state.clip.frameRate * state.time;
            state.speed = speed;
        }
    }
}
