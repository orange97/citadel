using UnityEngine;
using System.Collections;

public class DynamicSoundtrack : MonoBehaviour{
    public AudioClip[] clips;
    public int startingTrack = 0;
    private int currentTrack;
    private int nextTrack;
    private bool isFadingOut = false;
    private float fadeOutTime = 1.0f;
    private bool isFadingIn = false;
    private float fadeInTime = 1.0f;
    private bool waitSequence = true;
    private bool keepTime = false;
    private float targetVolume = 1.0f;
    private float oldVolume = 0.0f;
    private float fadeOutStart = 0.0f;
    private float fadeInStart = 0.0f;

    void Start(){
        audio.clip = clips[startingTrack];
        audio.Play();
        currentTrack = startingTrack;
    }

    void Update(){
        if (isFadingOut){
            if (audio.volume > 0){
                float elapsOut = Time.time - fadeOutStart;
                float indOut = elapsOut / fadeOutTime;
                audio.volume = oldVolume - (indOut * oldVolume);
            }else{
                isFadingOut = false;
                StartCoroutine(PlaySoundtrack());
            }
        }

        if (isFadingIn){
            if (audio.volume < targetVolume){
                float elapsIn = Time.time - fadeInStart;
                float indIn = elapsIn / fadeInTime;
                audio.volume = indIn;
            }else{
                audio.volume = targetVolume;
                isFadingIn = false;
            }
        }
    }

    public void ChangeSoundtrack(int newClip, bool waitForSequence, bool keepPreviousTime, float trackVolume, float fadeIn, float fadeOutPrevious){
        nextTrack = newClip;
        waitSequence = waitForSequence;
        keepTime = keepPreviousTime;
        targetVolume = trackVolume;
        fadeInTime = fadeIn;

        if (newClip != currentTrack){
            currentTrack = newClip;
            if (fadeOutPrevious != 0){
                oldVolume = audio.volume;
                fadeOutStart = Time.time;
                fadeOutTime = fadeOutPrevious;
                isFadingOut = true;
            }else{
                StartCoroutine(PlaySoundtrack());
            }
        }
    }
    IEnumerator PlaySoundtrack(){
        if (waitSequence)
            yield return new WaitForSeconds(audio.clip.length - ((float)audio.timeSamples / (float)audio.clip.frequency));

        if (fadeInTime != 0){
            audio.volume = 0;
            fadeInStart = Time.time;
            isFadingIn = true;
        }
        float StartingPoint = 0.0f;
        if (keepTime)
            StartingPoint = audio.timeSamples;

        audio.clip = clips[nextTrack];
        audio.timeSamples = Mathf.RoundToInt(StartingPoint);
        audio.Play();
    }
}